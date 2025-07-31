@extends('admin.layouts.main')

@section('content')

<!-- Analytics Sparkle Area -->
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Total Mahasiswa</h5>
                        <h2><span class="counter">{{ $stats['total_mahasiswa'] }}</span> <span class="tuition-fees">Mahasiswa</span></h2>
                        <span class="text-success">+15%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:15%;"> <span class="sr-only">15% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Total Dosen</h5>
                        <h2><span class="counter">{{ $stats['total_dosen'] }}</span> <span class="tuition-fees">Dosen</span></h2>
                        <span class="text-danger">+8%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:8%;"> <span class="sr-only">8% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Admin</h5>
                        <h2><span class="counter">{{ $stats['admin_count'] }}</span> <span class="tuition-fees">Admin</span></h2>
                        <span class="text-info">+12%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:12%;"> <span class="sr-only">12% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Kaprodi</h5>
                        <h2><span class="counter">{{ $stats['kaprodi_count'] }}</span> <span class="tuition-fees">Kaprodi</span></h2>
                        <span class="text-inverse">+5%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:5%;"> <span class="sr-only">5% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Area -->
<div class="charts-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="chart-container">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="chart-single-pro responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Mahasiswa Growth Chart</h2>
                                <p>Statistik pertumbuhan mahasiswa dan dosen dalam 6 bulan terakhir</p>
                            </div>
                            <div id="myChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="chart-single-pro">
                    <div class="alert-title">
                        <h2>Role Distribution</h2>
                        <p>Distribusi peran dosen dalam sistem</p>
                    </div>
                    <div id="sparklineLine"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities Area -->
<div class="recent-activity-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="recent-activity-wrapper notika-shadow mg-t-30 card-res-mg-t-pro-30 dk-res-t-pro-30">
                    <div class="recent-activity-header">
                        <h2>Recent Mahasiswa</h2>
                        <p>Mahasiswa terbaru yang mendaftar</p>
                        <div class="search-box">
                            <input type="text" id="searchRecentMahasiswa" class="form-control" placeholder="Search mahasiswa...">
                        </div>
                    </div>
                    <div class="recent-activity-content">
                        @forelse($stats['recent_mahasiswa'] as $mhs)
                        <div class="recent-activity-item" data-name="{{ strtolower($mhs->nama) }}" data-email="{{ strtolower($mhs->email) }}">
                            <div class="recent-activity-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="recent-activity-content">
                                <h5>{{ $mhs->nama }}</h5>
                                <p>{{ $mhs->email }}</p>
                                <span class="time">{{ $mhs->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="recent-activity-item">
                            <p>Belum ada mahasiswa terdaftar</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="recent-activity-wrapper notika-shadow mg-t-30 card-res-mg-t-pro-30 dk-res-t-pro-30">
                    <div class="recent-activity-header">
                        <h2>Recent Dosen</h2>
                        <p>Dosen terbaru yang terdaftar</p>
                        <div class="search-box">
                            <input type="text" id="searchRecentDosen" class="form-control" placeholder="Search dosen...">
                        </div>
                        <div class="filter-box">
                            <select id="filterDosenRole" class="form-control">
                                <option value="">All Roles</option>
                                <option value="admin">Admin</option>
                                <option value="kaprodi">Kaprodi</option>
                                <option value="dosen">Dosen</option>
                            </select>
                        </div>
                    </div>
                    <div class="recent-activity-content">
                        @forelse($stats['recent_dosen'] as $dosen)
                        <div class="recent-activity-item" data-name="{{ strtolower($dosen->nama) }}" data-nip="{{ $dosen->nip }}" data-role="{{ $dosen->role }}">
                            <div class="recent-activity-icon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <div class="recent-activity-content">
                                <h5>{{ $dosen->nama }}</h5>
                                <p>NIP: {{ $dosen->nip }} | Role: {{ ucfirst($dosen->role) }}</p>
                                <span class="time">{{ $dosen->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="recent-activity-item">
                            <p>Belum ada dosen terdaftar</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Area -->
<div class="quick-actions-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="quick-actions-wrapper notika-shadow mg-t-30 card-res-mg-t-pro-30 dk-res-t-pro-30">
                    <div class="quick-actions-header">
                        <h2>Quick Actions</h2>
                        <p>Aksi cepat untuk mengelola sistem</p>
                    </div>
                    <div class="quick-actions-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="quick-action-item">
                                    <a href="#" class="btn btn-primary btn-block" data-toggle="tooltip" title="Add new mahasiswa to the system">
                                        <i class="fa fa-user-plus"></i>
                                        <span>Add New Mahasiswa</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="quick-action-item">
                                    <a href="#" class="btn btn-success btn-block" data-toggle="tooltip" title="Add new dosen to the system">
                                        <i class="fa fa-graduation-cap"></i>
                                        <span>Add New Dosen</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="quick-action-item">
                                    <a href="#" class="btn btn-info btn-block" data-toggle="tooltip" title="Configure system settings">
                                        <i class="fa fa-cog"></i>
                                        <span>System Settings</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="quick-action-item">
                                    <a href="#" class="btn btn-warning btn-block export-btn" data-type="json" data-toggle="tooltip" title="Export dashboard data">
                                        <i class="fa fa-download"></i>
                                        <span>Export Data</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- System Status Area -->
<div class="system-status-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="system-status-wrapper notika-shadow mg-t-30 card-res-mg-t-pro-30 dk-res-t-pro-30">
                    <div class="system-status-header">
                        <h2>System Status</h2>
                        <p>Status sistem dan performa</p>
                    </div>
                    <div class="system-status-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="status-item" data-toggle="popover" data-trigger="hover" data-content="Server is running optimally">
                                    <div class="status-icon">
                                        <i class="fa fa-server text-success"></i>
                                    </div>
                                    <div class="status-info">
                                        <h5>Server Status</h5>
                                        <p class="text-success">Online</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="status-item" data-toggle="popover" data-trigger="hover" data-content="Database connection is stable">
                                    <div class="status-icon">
                                        <i class="fa fa-database text-info"></i>
                                    </div>
                                    <div class="status-info">
                                        <h5>Database</h5>
                                        <p class="text-info">Connected</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="status-item" data-toggle="popover" data-trigger="hover" data-content="All security protocols are active">
                                    <div class="status-icon">
                                        <i class="fa fa-shield text-warning"></i>
                                    </div>
                                    <div class="status-info">
                                        <h5>Security</h5>
                                        <p class="text-warning">Protected</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="status-item" data-toggle="popover" data-trigger="hover" data-content="System uptime percentage">
                                    <div class="status-icon">
                                        <i class="fa fa-clock-o text-primary"></i>
                                    </div>
                                    <div class="status-info">
                                        <h5>Uptime</h5>
                                        <p class="text-primary">99.9%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notifications Container -->
<div class="notifications-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>

<script>
// Chart data dari controller
var chartData = [
    @foreach($chartData['labels'] as $index => $label)
    {
        month: '{{ $label }}',
        mahasiswa: {{ $chartData['mahasiswa'][$index] }},
        dosen: {{ $chartData['dosen'][$index] }}
    }@if(!$loop->last),@endif
    @endforeach
];

// Stats data untuk JavaScript
var totalMahasiswa = {{ $stats['total_mahasiswa'] }};
var totalDosen = {{ $stats['total_dosen'] }};
var adminCount = {{ $stats['admin_count'] }};
var kaprodiCount = {{ $stats['kaprodi_count'] }};
var dosenCount = {{ $stats['dosen_count'] }};

// Morris Chart untuk Mahasiswa Growth
Morris.Line({
    element: 'myChart',
    data: chartData,
    xkey: 'month',
    ykeys: ['mahasiswa', 'dosen'],
    labels: ['Mahasiswa', 'Dosen'],
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

// Sparkline untuk Role Distribution
$("#sparklineLine").sparkline([adminCount, kaprodiCount, dosenCount], {
    type: 'pie',
    height: '200',
    sliceColors: ['#3c8dbc', '#00a65a', '#f39c12'],
    tooltipFormatFieldlist: ['Admin', 'Kaprodi', 'Dosen'],
    tooltipFormatFieldlistKey: 'field'
});

// Search functionality untuk mahasiswa
$('#searchRecentMahasiswa').on('keyup', function() {
    var value = $(this).val().toLowerCase();
    $('.recent-activity-item[data-name]').filter(function() {
        var name = $(this).data('name');
        var email = $(this).data('email');
        var match = name.indexOf(value) > -1 || email.indexOf(value) > -1;
        $(this).toggle(match);
    });
});

$('#searchRecentDosen').on('keyup', function() {
    var value = $(this).val().toLowerCase();
    var roleFilter = $('#filterDosenRole').val();
    
    $('.recent-activity-item[data-role]').filter(function() {
        var name = $(this).data('name');
        var nip = $(this).data('nip');
        var role = $(this).data('role');
        
        var nameMatch = name.indexOf(value) > -1 || nip.indexOf(value) > -1;
        var roleMatch = !roleFilter || role === roleFilter;
        
        $(this).toggle(nameMatch && roleMatch);
    });
});

$('#filterDosenRole').on('change', function() {
    $('#searchRecentDosen').trigger('keyup');
});
</script>
@endsection