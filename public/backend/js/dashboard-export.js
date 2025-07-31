// Dashboard Export Functionality

class DashboardExport {
    constructor() {
        this.exportFormats = ['json', 'csv', 'pdf'];
        this.init();
    }
    
    init() {
        this.setupEventListeners();
        this.initializeExportButtons();
    }
    
    setupEventListeners() {
        // Export button click
        $(document).on('click', '.export-btn', (e) => {
            e.preventDefault();
            const format = $(e.currentTarget).data('type') || 'json';
            this.exportData(format);
        });
        
        // Export all data
        $(document).on('click', '.export-all-btn', (e) => {
            e.preventDefault();
            this.exportAllData();
        });
        
        // Export specific section
        $(document).on('click', '.export-section-btn', (e) => {
            e.preventDefault();
            const section = $(e.currentTarget).data('section');
            this.exportSection(section);
        });
    }
    
    initializeExportButtons() {
        // Add export buttons to different sections
        this.addExportButtons();
    }
    
    addExportButtons() {
        // Add export button to analytics section
        $('.analytics-sparkle-area').append(`
            <div class="export-controls" style="text-align: right; margin-top: 20px;">
                <button class="btn btn-sm btn-outline-primary export-section-btn" data-section="analytics">
                    <i class="fa fa-download"></i> Export Analytics
                </button>
            </div>
        `);
        
        // Add export button to recent activities
        $('.recent-activity-wrapper').each(function() {
            const section = $(this).find('h2').text().toLowerCase().replace(/\s+/g, '-');
            $(this).find('.recent-activity-header').append(`
                <div class="export-controls" style="margin-top: 10px;">
                    <button class="btn btn-sm btn-outline-secondary export-section-btn" data-section="${section}">
                        <i class="fa fa-download"></i> Export
                    </button>
                </div>
            `);
        });
    }
    
    exportData(format = 'json') {
        this.showLoadingState();
        
        $.ajax({
            url: `/admin/dashboard/export/${format}`,
            method: 'GET',
            success: (response) => {
                this.handleExportSuccess(response, format);
            },
            error: (xhr, status, error) => {
                this.handleExportError(error);
            }
        });
    }
    
    exportAllData() {
        this.showLoadingState();
        
        // Collect all dashboard data
        const allData = {
            analytics: this.getAnalyticsData(),
            recentActivities: this.getRecentActivitiesData(),
            systemStatus: this.getSystemStatusData(),
            charts: this.getChartData(),
            exportInfo: {
                exportedAt: new Date().toISOString(),
                exportedBy: 'Admin Dashboard',
                version: '1.0'
            }
        };
        
        this.downloadData(allData, 'dashboard-complete-data.json', 'application/json');
        this.hideLoadingState();
    }
    
    exportSection(section) {
        this.showLoadingState();
        
        let data;
        switch(section) {
            case 'analytics':
                data = this.getAnalyticsData();
                break;
            case 'recent-users':
                data = this.getRecentUsersData();
                break;
            case 'recent-dosen':
                data = this.getRecentDosenData();
                break;
            case 'system-status':
                data = this.getSystemStatusData();
                break;
            default:
                data = { error: 'Unknown section' };
        }
        
        this.downloadData(data, `dashboard-${section}.json`, 'application/json');
        this.hideLoadingState();
    }
    
    getAnalyticsData() {
        const analytics = {};
        
        $('.analytics-sparkle-line').each(function() {
            const title = $(this).find('h5').text();
            const value = $(this).find('.counter').text();
            const percentage = $(this).find('.text-success, .text-danger, .text-info, .text-inverse').text();
            
            analytics[title.toLowerCase().replace(/\s+/g, '_')] = {
                value: parseInt(value) || 0,
                percentage: percentage,
                title: title
            };
        });
        
        return analytics;
    }
    
    getRecentUsersData() {
        const users = [];
        
        $('.recent-activity-item[data-name]').each(function() {
            const name = $(this).find('h5').text();
            const email = $(this).find('p').text();
            const time = $(this).find('.time').text();
            
            users.push({
                name: name,
                email: email,
                registered: time
            });
        });
        
        return users;
    }
    
    getRecentDosenData() {
        const dosen = [];
        
        $('.recent-activity-item[data-role]').each(function() {
            const name = $(this).find('h5').text();
            const info = $(this).find('p').text();
            const time = $(this).find('.time').text();
            const role = $(this).data('role');
            const nip = $(this).data('nip');
            
            dosen.push({
                name: name,
                nip: nip,
                role: role,
                info: info,
                registered: time
            });
        });
        
        return dosen;
    }
    
    getRecentActivitiesData() {
        return {
            users: this.getRecentUsersData(),
            dosen: this.getRecentDosenData()
        };
    }
    
    getSystemStatusData() {
        const status = {};
        
        $('.status-item').each(function() {
            const title = $(this).find('h5').text();
            const statusText = $(this).find('p').text();
            const isOnline = $(this).find('p').hasClass('text-success');
            
            status[title.toLowerCase().replace(/\s+/g, '_')] = {
                status: statusText,
                online: isOnline,
                title: title
            };
        });
        
        return status;
    }
    
    getChartData() {
        // Get chart data if available
        if (window.chartData) {
            return window.chartData;
        }
        
        return {
            message: 'Chart data not available'
        };
    }
    
    handleExportSuccess(response, format) {
        this.hideLoadingState();
        
        if (format === 'json') {
            this.downloadData(response, `dashboard-export-${new Date().getTime()}.json`, 'application/json');
        } else if (format === 'csv') {
            const csv = this.convertToCSV(response);
            this.downloadData(csv, `dashboard-export-${new Date().getTime()}.csv`, 'text/csv');
        } else if (format === 'pdf') {
            this.generatePDF(response);
        }
        
        this.showSuccessMessage('Data exported successfully!');
    }
    
    handleExportError(error) {
        this.hideLoadingState();
        this.showErrorMessage('Export failed: ' + error);
    }
    
    convertToCSV(data) {
        // Simple CSV conversion
        let csv = '';
        
        if (Array.isArray(data)) {
            // Array of objects
            if (data.length > 0) {
                const headers = Object.keys(data[0]);
                csv += headers.join(',') + '\n';
                
                data.forEach(row => {
                    const values = headers.map(header => {
                        const value = row[header] || '';
                        return `"${value}"`;
                    });
                    csv += values.join(',') + '\n';
                });
            }
        } else {
            // Single object
            const headers = Object.keys(data);
            csv += headers.join(',') + '\n';
            
            const values = headers.map(header => {
                const value = data[header] || '';
                return `"${value}"`;
            });
            csv += values.join(',') + '\n';
        }
        
        return csv;
    }
    
    generatePDF(data) {
        // For PDF generation, you would typically use a library like jsPDF
        // For now, we'll show a message
        this.showInfoMessage('PDF export requires additional setup. Please use JSON or CSV format.');
    }
    
    downloadData(data, filename, contentType) {
        const blob = new Blob([JSON.stringify(data, null, 2)], { type: contentType });
        const url = window.URL.createObjectURL(blob);
        
        const link = document.createElement('a');
        link.href = url;
        link.download = filename;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        window.URL.revokeObjectURL(url);
    }
    
    showLoadingState() {
        // Show loading indicator
        $('body').append(`
            <div id="export-loading" style="
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
            ">
                <div style="
                    background: white;
                    padding: 20px;
                    border-radius: 5px;
                    text-align: center;
                ">
                    <i class="fa fa-spinner fa-spin" style="font-size: 24px; margin-bottom: 10px;"></i>
                    <p>Exporting data...</p>
                </div>
            </div>
        `);
    }
    
    hideLoadingState() {
        $('#export-loading').remove();
    }
    
    showSuccessMessage(message) {
        this.showNotification('Success', message, 'success');
    }
    
    showErrorMessage(message) {
        this.showNotification('Error', message, 'error');
    }
    
    showInfoMessage(message) {
        this.showNotification('Info', message, 'info');
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
            const alertClass = `alert-${type === 'error' ? 'danger' : type}`;
            const alertHtml = `
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
    
    // Utility methods
    formatDate(date) {
        return new Date(date).toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }
    
    formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
}

// Initialize export functionality when document is ready
$(document).ready(function() {
    window.dashboardExport = new DashboardExport();
}); 