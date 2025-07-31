// Custom JavaScript untuk Dashboard Admin

$(document).ready(function() {
    
    // Initialize dashboard components
    initializeDashboard();
    
    // Auto refresh data setiap 30 detik
    setInterval(refreshDashboardData, 30000);
    
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Initialize popovers
    $('[data-toggle="popover"]').popover();
    
    // Smooth scrolling untuk anchor links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });
    
    // Quick action buttons functionality
    $('.quick-action-item .btn').on('click', function(e) {
        e.preventDefault();
        var action = $(this).find('span').text();
        
        // Show loading state
        $(this).addClass('loading');
        
        // Simulate action (replace with actual functionality)
        setTimeout(function() {
            showNotification('Success', action + ' action completed successfully!', 'success');
            $('.quick-action-item .btn').removeClass('loading');
        }, 2000);
    });
    
    // Recent activity item hover effects
    $('.recent-activity-item').hover(
        function() {
            $(this).addClass('hovered');
        },
        function() {
            $(this).removeClass('hovered');
        }
    );
    
    // Status item click to show details
    $('.status-item').on('click', function() {
        var statusType = $(this).find('h5').text();
        showStatusDetails(statusType);
    });
    
    // Chart hover effects
    $('#myChart').on('mouseenter', function() {
        $(this).addClass('chart-hover');
    }).on('mouseleave', function() {
        $(this).removeClass('chart-hover');
    });
    
    // Counter animation on scroll
    $(window).on('scroll', function() {
        $('.counter').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate-counter');
            }
        });
    });
    
    // Search functionality for recent activities
    $('#searchRecent').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.recent-activity-item').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    
    // Export functionality
    $('.export-btn').on('click', function() {
        var exportType = $(this).data('type');
        exportDashboardData(exportType);
    });
    
    // Real-time updates
    initializeRealTimeUpdates();
    
});

// Initialize dashboard components
function initializeDashboard() {
    console.log('Initializing dashboard...');
    
    // Initialize charts
    initializeCharts();
    
    // Initialize notifications
    initializeNotifications();
    
    // Initialize system status
    updateSystemStatus();
    
    // Initialize quick stats
    updateQuickStats();
}

// Initialize charts
function initializeCharts() {
    // Morris Chart untuk User Growth
    if (typeof Morris !== 'undefined' && $('#myChart').length) {
        Morris.Line({
            element: 'myChart',
            data: chartData,
            xkey: 'month',
            ykeys: ['users', 'dosen'],
            labels: ['Users', 'Dosen'],
            lineColors: ['#3c8dbc', '#00a65a'],
            hideHover: 'auto',
            resize: true,
            smooth: true,
            pointSize: 4,
            lineWidth: 2,
            grid: true,
            gridTextColor: '#999',
            gridTextSize: 10
        });
    }
    
    // Sparkline untuk Role Distribution
    if (typeof $.fn.sparkline !== 'undefined' && $('#sparklineLine').length) {
        $("#sparklineLine").sparkline([adminCount, kaprodiCount, dosenCount], {
            type: 'pie',
            height: '200',
            sliceColors: ['#3c8dbc', '#00a65a', '#f39c12'],
            tooltipFormatFieldlist: ['Admin', 'Kaprodi', 'Dosen'],
            tooltipFormatFieldlistKey: 'field'
        });
    }
}

// Initialize notifications
function initializeNotifications() {
    // Check for new notifications
    checkNewNotifications();
    
    // Set up notification polling
    setInterval(checkNewNotifications, 60000); // Check every minute
}

// Check for new notifications
function checkNewNotifications() {
    // Simulate checking for new notifications
    // Replace with actual AJAX call
    $.ajax({
        url: '/admin/notifications/check',
        method: 'GET',
        success: function(response) {
            if (response.hasNew) {
                showNotification('New Notification', response.message, 'info');
                updateNotificationBadge(response.count);
            }
        },
        error: function() {
            // Handle error silently
        }
    });
}

// Show notification
function showNotification(title, message, type) {
    // Use Lobibox for notifications if available
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
        // Fallback to Bootstrap alert
        var alertClass = 'alert-' + type;
        var alertHtml = '<div class="alert ' + alertClass + ' alert-dismissible fade in" role="alert">' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span></button>' +
            '<strong>' + title + '</strong> ' + message +
            '</div>';
        
        $('.notifications-container').prepend(alertHtml);
        
        // Auto dismiss after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    }
}

// Update notification badge
function updateNotificationBadge(count) {
    $('.notification-badge').text(count).show();
}

// Update system status
function updateSystemStatus() {
    $.ajax({
        url: '/admin/system/status',
        method: 'GET',
        success: function(response) {
            updateStatusIndicators(response);
        },
        error: function() {
            // Handle error
        }
    });
}

// Update status indicators
function updateStatusIndicators(status) {
    $('.status-item').each(function() {
        var statusType = $(this).find('h5').text().toLowerCase();
        var statusElement = $(this).find('.status-info p');
        
        if (status[statusType]) {
            statusElement.removeClass('text-danger').addClass('text-success').text('Online');
            $(this).find('.status-icon i').removeClass('text-danger').addClass('text-success');
        } else {
            statusElement.removeClass('text-success').addClass('text-danger').text('Offline');
            $(this).find('.status-icon i').removeClass('text-success').addClass('text-danger');
        }
    });
}

// Update quick stats
function updateQuickStats() {
    $.ajax({
        url: '/admin/dashboard/stats',
        method: 'GET',
        success: function(response) {
            updateCounters(response);
        },
        error: function() {
            // Handle error
        }
    });
}

// Update counters with animation
function updateCounters(stats) {
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

// Show status details
function showStatusDetails(statusType) {
    var details = {
        'Server Status': 'Server is running optimally with 99.9% uptime',
        'Database': 'Database connection is stable with 150 active connections',
        'Security': 'All security protocols are active and up to date',
        'Uptime': 'System has been running for 15 days, 7 hours, 32 minutes'
    };
    
    showNotification(statusType, details[statusType], 'info');
}

// Export dashboard data
function exportDashboardData(type) {
    var url = '/admin/dashboard/export/' + type;
    
    // Show loading
    showNotification('Exporting', 'Preparing your export...', 'info');
    
    // Create temporary link for download
    var link = document.createElement('a');
    link.href = url;
    link.download = 'dashboard-data.' + type;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    
    // Show success message
    setTimeout(function() {
        showNotification('Export Complete', 'Your data has been exported successfully!', 'success');
    }, 2000);
}

// Refresh dashboard data
function refreshDashboardData() {
    console.log('Refreshing dashboard data...');
    
    // Update stats
    updateQuickStats();
    
    // Update system status
    updateSystemStatus();
    
    // Update recent activities
    updateRecentActivities();
}

// Update recent activities
function updateRecentActivities() {
    $.ajax({
        url: '/admin/dashboard/recent-activities',
        method: 'GET',
        success: function(response) {
            updateRecentUsers(response.users);
            updateRecentDosen(response.dosen);
        },
        error: function() {
            // Handle error
        }
    });
}

// Update recent users
function updateRecentUsers(users) {
    var container = $('.recent-activity-content').first();
    container.empty();
    
    users.forEach(function(user) {
        var userHtml = '<div class="recent-activity-item">' +
            '<div class="recent-activity-icon">' +
            '<i class="fa fa-user"></i>' +
            '</div>' +
            '<div class="recent-activity-content">' +
            '<h5>' + user.name + '</h5>' +
            '<p>' + user.email + '</p>' +
            '<span class="time">' + user.created_at + '</span>' +
            '</div>' +
            '</div>';
        
        container.append(userHtml);
    });
}

// Update recent dosen
function updateRecentDosen(dosen) {
    var container = $('.recent-activity-content').last();
    container.empty();
    
    dosen.forEach(function(d) {
        var dosenHtml = '<div class="recent-activity-item">' +
            '<div class="recent-activity-icon">' +
            '<i class="fa fa-graduation-cap"></i>' +
            '</div>' +
            '<div class="recent-activity-content">' +
            '<h5>' + d.nama + '</h5>' +
            '<p>NIP: ' + d.nip + ' | Role: ' + d.role + '</p>' +
            '<span class="time">' + d.created_at + '</span>' +
            '</div>' +
            '</div>';
        
        container.append(dosenHtml);
    });
}

// Initialize real-time updates
function initializeRealTimeUpdates() {
    // WebSocket connection for real-time updates
    if (typeof io !== 'undefined') {
        var socket = io();
        
        socket.on('dashboard-update', function(data) {
            console.log('Real-time update received:', data);
            
            // Update specific components based on data type
            switch(data.type) {
                case 'new_user':
                    showNotification('New User', 'A new user has registered', 'info');
                    updateQuickStats();
                    break;
                case 'new_dosen':
                    showNotification('New Dosen', 'A new dosen has been added', 'info');
                    updateQuickStats();
                    break;
                case 'system_alert':
                    showNotification('System Alert', data.message, 'warning');
                    break;
            }
        });
    }
}

// Utility functions
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatDate(date) {
    return new Date(date).toLocaleDateString('id-ID', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

// Performance monitoring
function monitorPerformance() {
    // Monitor page load time
    var loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
    console.log('Page load time:', loadTime + 'ms');
    
    // Monitor memory usage
    if (performance.memory) {
        console.log('Memory usage:', formatNumber(performance.memory.usedJSHeapSize) + ' bytes');
    }
}

// Initialize performance monitoring
$(window).on('load', function() {
    monitorPerformance();
}); 