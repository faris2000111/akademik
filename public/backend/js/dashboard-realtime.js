// Real-time Dashboard Updates

class DashboardRealTime {
    constructor() {
        this.updateInterval = 30000; // 30 seconds
        this.chartUpdateInterval = 60000; // 1 minute
        this.notificationInterval = 45000; // 45 seconds
        this.isConnected = false;
        this.reconnectAttempts = 0;
        this.maxReconnectAttempts = 5;
        
        this.init();
    }
    
    init() {
        console.log('Initializing real-time dashboard updates...');
        this.startPeriodicUpdates();
        this.initializeWebSocket();
        this.setupEventListeners();
    }
    
    startPeriodicUpdates() {
        // Update stats every 30 seconds
        setInterval(() => {
            this.updateStats();
        }, this.updateInterval);
        
        // Update charts every minute
        setInterval(() => {
            this.updateCharts();
        }, this.chartUpdateInterval);
        
        // Check notifications every 45 seconds
        setInterval(() => {
            this.checkNotifications();
        }, this.notificationInterval);
    }
    
    initializeWebSocket() {
        // Check if WebSocket is available
        if (typeof io !== 'undefined') {
            try {
                this.socket = io();
                this.setupWebSocketEvents();
                this.isConnected = true;
                console.log('WebSocket connected');
            } catch (error) {
                console.log('WebSocket not available, using AJAX fallback');
                this.isConnected = false;
            }
        } else {
            console.log('Socket.io not available, using AJAX fallback');
            this.isConnected = false;
        }
    }
    
    setupWebSocketEvents() {
        if (!this.socket) return;
        
        this.socket.on('connect', () => {
            console.log('WebSocket connected');
            this.isConnected = true;
            this.reconnectAttempts = 0;
        });
        
        this.socket.on('disconnect', () => {
            console.log('WebSocket disconnected');
            this.isConnected = false;
            this.attemptReconnect();
        });
        
        this.socket.on('dashboard-update', (data) => {
            this.handleRealTimeUpdate(data);
        });
        
        this.socket.on('new-user', (data) => {
            this.handleNewUser(data);
        });
        
        this.socket.on('new-dosen', (data) => {
            this.handleNewDosen(data);
        });
        
        this.socket.on('system-alert', (data) => {
            this.handleSystemAlert(data);
        });
    }
    
    attemptReconnect() {
        if (this.reconnectAttempts < this.maxReconnectAttempts) {
            this.reconnectAttempts++;
            console.log(`Attempting to reconnect... (${this.reconnectAttempts}/${this.maxReconnectAttempts})`);
            
            setTimeout(() => {
                this.initializeWebSocket();
            }, 5000 * this.reconnectAttempts); // Exponential backoff
        } else {
            console.log('Max reconnection attempts reached');
        }
    }
    
    setupEventListeners() {
        // Listen for visibility change to pause/resume updates
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.pauseUpdates();
            } else {
                this.resumeUpdates();
            }
        });
        
        // Listen for online/offline events
        window.addEventListener('online', () => {
            this.handleOnline();
        });
        
        window.addEventListener('offline', () => {
            this.handleOffline();
        });
    }
    
    updateStats() {
        $.ajax({
            url: '/admin/dashboard/stats',
            method: 'GET',
            success: (response) => {
                this.updateCounters(response);
            },
            error: (xhr, status, error) => {
                console.log('Error updating stats:', error);
            }
        });
    }
    
    updateCharts() {
        $.ajax({
            url: '/admin/dashboard/chart-data',
            method: 'GET',
            success: (response) => {
                this.updateChartData(response);
            },
            error: (xhr, status, error) => {
                console.log('Error updating charts:', error);
            }
        });
    }
    
    checkNotifications() {
        $.ajax({
            url: '/admin/notifications/check',
            method: 'GET',
            success: (response) => {
                if (response.hasNew) {
                    this.showNotification('New Notification', response.message, 'info');
                    this.updateNotificationBadge(response.count);
                }
            },
            error: (xhr, status, error) => {
                console.log('Error checking notifications:', error);
            }
        });
    }
    
    updateCounters(stats) {
        $('.counter').each(function() {
            var target = parseInt($(this).text());
            var current = 0;
            var increment = target / 50;
            
            var timer = setInterval(function() {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                $(this).text(Math.floor(current));
            }.bind(this), 50);
        });
    }
    
    updateChartData(data) {
        // Update Morris chart
        if (window.morrisChart) {
            window.morrisChart.setData(data);
        }
        
        // Update Sparkline
        if (data.roleDistribution) {
            $("#sparklineLine").sparkline(data.roleDistribution, {
                type: 'pie',
                height: '200',
                sliceColors: ['#3c8dbc', '#00a65a', '#f39c12']
            });
        }
    }
    
    handleRealTimeUpdate(data) {
        console.log('Real-time update received:', data);
        
        switch(data.type) {
            case 'stats':
                this.updateCounters(data.stats);
                break;
            case 'chart':
                this.updateChartData(data.chartData);
                break;
            case 'activity':
                this.updateRecentActivities(data.activities);
                break;
            case 'status':
                this.updateSystemStatus(data.status);
                break;
        }
    }
    
    handleNewUser(user) {
        this.showNotification('New User', `${user.name} has registered`, 'success');
        this.addUserToRecentList(user);
        this.updateStats();
    }
    
    handleNewDosen(dosen) {
        this.showNotification('New Dosen', `${dosen.nama} has been added`, 'success');
        this.addDosenToRecentList(dosen);
        this.updateStats();
    }
    
    handleSystemAlert(alert) {
        this.showNotification('System Alert', alert.message, alert.level || 'warning');
        this.updateSystemStatus(alert.status);
    }
    
    addUserToRecentList(user) {
        var userHtml = `
            <div class="recent-activity-item" data-name="${user.name.toLowerCase()}" data-email="${user.email.toLowerCase()}">
                <div class="recent-activity-icon">
                    <i class="fa fa-user"></i>
                </div>
                <div class="recent-activity-content">
                    <h5>${user.name}</h5>
                    <p>${user.email}</p>
                    <span class="time">Just now</span>
                </div>
            </div>
        `;
        
        $('.recent-activity-content').first().prepend(userHtml);
    }
    
    addDosenToRecentList(dosen) {
        var dosenHtml = `
            <div class="recent-activity-item" data-name="${dosen.nama.toLowerCase()}" data-nip="${dosen.nip}" data-role="${dosen.role}">
                <div class="recent-activity-icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>
                <div class="recent-activity-content">
                    <h5>${dosen.nama}</h5>
                    <p>NIP: ${dosen.nip} | Role: ${dosen.role}</p>
                    <span class="time">Just now</span>
                </div>
            </div>
        `;
        
        $('.recent-activity-content').last().prepend(dosenHtml);
    }
    
    updateRecentActivities(activities) {
        if (activities.users) {
            this.updateRecentUsers(activities.users);
        }
        if (activities.dosen) {
            this.updateRecentDosen(activities.dosen);
        }
    }
    
    updateRecentUsers(users) {
        var container = $('.recent-activity-content').first();
        container.empty();
        
        users.forEach(user => {
            var userHtml = `
                <div class="recent-activity-item" data-name="${user.name.toLowerCase()}" data-email="${user.email.toLowerCase()}">
                    <div class="recent-activity-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="recent-activity-content">
                        <h5>${user.name}</h5>
                        <p>${user.email}</p>
                        <span class="time">${user.created_at}</span>
                    </div>
                </div>
            `;
            container.append(userHtml);
        });
    }
    
    updateRecentDosen(dosen) {
        var container = $('.recent-activity-content').last();
        container.empty();
        
        dosen.forEach(d => {
            var dosenHtml = `
                <div class="recent-activity-item" data-name="${d.nama.toLowerCase()}" data-nip="${d.nip}" data-role="${d.role}">
                    <div class="recent-activity-icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <div class="recent-activity-content">
                        <h5>${d.nama}</h5>
                        <p>NIP: ${d.nip} | Role: ${d.role}</p>
                        <span class="time">${d.created_at}</span>
                    </div>
                </div>
            `;
            container.append(dosenHtml);
        });
    }
    
    updateSystemStatus(status) {
        Object.keys(status).forEach(key => {
            var statusElement = $(`.status-item:has(h5:contains("${key}")) .status-info p`);
            var iconElement = $(`.status-item:has(h5:contains("${key}")) .status-icon i`);
            
            if (status[key]) {
                statusElement.removeClass('text-danger').addClass('text-success').text('Online');
                iconElement.removeClass('text-danger').addClass('text-success');
            } else {
                statusElement.removeClass('text-success').addClass('text-danger').text('Offline');
                iconElement.removeClass('text-success').addClass('text-danger');
            }
        });
    }
    
    showNotification(title, message, type) {
        if (typeof Lobibox !== 'undefined') {
            Lobibox.notify(type, {
                size: 'mini',
                rounded: true,
                delay: 3000,
                position: 'top right',
                msg: message,
                title: title
            });
        } else {
            // Fallback notification
            var alertClass = `alert-${type}`;
            var alertHtml = `
                <div class="alert ${alertClass} alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>${title}</strong> ${message}
                </div>
            `;
            
            $('.notifications-container').prepend(alertHtml);
            
            setTimeout(() => {
                $('.alert').fadeOut();
            }, 5000);
        }
    }
    
    updateNotificationBadge(count) {
        $('.notification-badge').text(count).show();
    }
    
    pauseUpdates() {
        console.log('Pausing updates - page not visible');
        // Pause periodic updates when page is not visible
    }
    
    resumeUpdates() {
        console.log('Resuming updates - page visible');
        // Resume updates when page becomes visible
        this.updateStats();
        this.checkNotifications();
    }
    
    handleOnline() {
        console.log('Connection restored');
        this.showNotification('Connection Restored', 'Real-time updates are now active', 'success');
        this.initializeWebSocket();
    }
    
    handleOffline() {
        console.log('Connection lost');
        this.showNotification('Connection Lost', 'Real-time updates are temporarily disabled', 'warning');
        this.isConnected = false;
    }
    
    // Public methods for external use
    forceUpdate() {
        this.updateStats();
        this.updateCharts();
        this.checkNotifications();
    }
    
    getConnectionStatus() {
        return {
            isConnected: this.isConnected,
            reconnectAttempts: this.reconnectAttempts,
            maxReconnectAttempts: this.maxReconnectAttempts
        };
    }
}

// Initialize real-time dashboard when document is ready
$(document).ready(function() {
    window.dashboardRealTime = new DashboardRealTime();
}); 