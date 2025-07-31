<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\admin\DashboardController;

Route::get('/', [IndexController::class, 'index'])->name('beranda');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');

// User (Mahasiswa) Login
Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('loginuser.form');
Route::post('/login', [UserLoginController::class, 'login'])->name('loginuser');
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');

// Admin (Dosen) Login
Route::get('/loginadmin', [AdminLoginController::class, 'showLoginForm'])->name('loginadmin.form');
Route::post('/loginadmin', [AdminLoginController::class, 'login'])->name('loginadmin');
Route::post('/adminlogout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::middleware('auth:dosen')->group(function () {
    Route::resource('admin/dashboard', DashboardController::class)->names([
        'index' => 'admin.dashboard.index',
        'create' => 'admin.dashboard.create',
        'store' => 'admin.dashboard.store',
        'show' => 'admin.dashboard.show',
        'edit' => 'admin.dashboard.edit',
        'update' => 'admin.dashboard.update',
        'destroy' => 'admin.dashboard.destroy',
    ]);
    
    // Additional dashboard routes
    Route::get('admin/dashboard/stats', [DashboardController::class, 'getStats'])->name('admin.dashboard.stats');
    Route::get('admin/dashboard/recent-activities', [DashboardController::class, 'getRecentActivities'])->name('admin.dashboard.activities');
    Route::get('admin/dashboard/system/status', [DashboardController::class, 'getSystemStatus'])->name('admin.dashboard.system.status');
    Route::get('admin/dashboard/export/{type?}', [DashboardController::class, 'exportData'])->name('admin.dashboard.export');
    Route::get('admin/dashboard/chart-data', [DashboardController::class, 'getChartData'])->name('admin.dashboard.chart.data');
    Route::get('admin/notifications/check', [DashboardController::class, 'checkNotifications'])->name('admin.notifications.check');

    Route::resource('admin/dosen', \App\Http\Controllers\admin\DosenController::class)->names([
        'index' => 'admin.dosen.index',
        'create' => 'admin.dosen.create',
        'store' => 'admin.dosen.store',
        'show' => 'admin.dosen.show',
        'edit' => 'admin.dosen.edit',
        'update' => 'admin.dosen.update',
        'destroy' => 'admin.dosen.destroy',
    ]);

    Route::resource('admin/mahasiswa', \App\Http\Controllers\admin\MahasiswaController::class)->names([
        'index' => 'admin.mahasiswa.index',
        'create' => 'admin.mahasiswa.create',
        'store' => 'admin.mahasiswa.store',
        'show' => 'admin.mahasiswa.show',
        'edit' => 'admin.mahasiswa.edit',
        'update' => 'admin.mahasiswa.update',
        'destroy' => 'admin.mahasiswa.destroy',
    ]);

    // CRUD Matakuliah
    Route::resource('admin/matakuliah', \App\Http\Controllers\admin\MatakuliahController::class)->names([
        'index' => 'admin.matakuliah.index',
        'create' => 'admin.matakuliah.create',
        'store' => 'admin.matakuliah.store',
        'show' => 'admin.matakuliah.show',
        'edit' => 'admin.matakuliah.edit',
        'update' => 'admin.matakuliah.update',
        'destroy' => 'admin.matakuliah.destroy',
    ]);

    // CRUD Ruang
    Route::resource('admin/ruang', \App\Http\Controllers\admin\RuangController::class)->names([
        'index' => 'admin.ruang.index',
        'create' => 'admin.ruang.create',
        'store' => 'admin.ruang.store',
        'show' => 'admin.ruang.show',
        'edit' => 'admin.ruang.edit',
        'update' => 'admin.ruang.update',
        'destroy' => 'admin.ruang.destroy',
    ]);

    // CRUD KRS
    Route::resource('admin/krs', \App\Http\Controllers\admin\KrsController::class)->names([
        'index' => 'admin.krs.index',
        'create' => 'admin.krs.create',
        'store' => 'admin.krs.store',
        'show' => 'admin.krs.show',
        'edit' => 'admin.krs.edit',
        'update' => 'admin.krs.update',
        'destroy' => 'admin.krs.destroy',
    ]);

    // CRUD Jadwal
    Route::resource('admin/jadwal', \App\Http\Controllers\admin\JadwalController::class)->names([
        'index' => 'admin.jadwal.index',
        'create' => 'admin.jadwal.create',
        'store' => 'admin.jadwal.store',
        'show' => 'admin.jadwal.show',
        'edit' => 'admin.jadwal.edit',
        'update' => 'admin.jadwal.update',
        'destroy' => 'admin.jadwal.destroy',
    ]);
});

// Route Absensi Dosen & Mahasiswa
Route::middleware(['auth:dosen', 'check.dosen.role'])->prefix('dosen/absen')->group(function () {
    Route::get('/dosen', [\App\Http\Controllers\admin\AbsensiDosenController::class, 'index'])->name('dosen.absen.dosen');
    Route::post('/dosen', [\App\Http\Controllers\admin\AbsensiDosenController::class, 'store']);

    Route::get('/mahasiswa', [\App\Http\Controllers\admin\AbsensiMahasiswaController::class, 'index'])->name('dosen.absen.mahasiswa');
    Route::post('/mahasiswa', [\App\Http\Controllers\admin\AbsensiMahasiswaController::class, 'store']);
});
