<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik untuk dashboard
        $stats = [
            'total_mahasiswa' => Mahasiswa::count(),
            'total_dosen' => Dosen::count(),
            'admin_count' => Dosen::where('role', 'admin')->count(),
            'kaprodi_count' => Dosen::where('role', 'kaprodi')->count(),
            'dosen_count' => Dosen::where('role', 'dosen')->count(),
            'recent_mahasiswa' => Mahasiswa::latest()->take(5)->get(),
            'recent_dosen' => Dosen::latest()->take(5)->get(),
        ];

        // Data untuk chart (contoh data statis, bisa disesuaikan dengan kebutuhan)
        $chartData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'mahasiswa' => [65, 59, 80, 81, 56, 55],
            'dosen' => [28, 48, 40, 19, 86, 27],
        ];

        return view('admin.dashboard', compact('stats', 'chartData'));
    }

    /**
     * Get dashboard statistics via AJAX
     */
    public function getStats()
    {
        $stats = Cache::remember('dashboard_stats', 300, function () {
            return [
                'total_mahasiswa' => Mahasiswa::count(),
                'total_dosen' => Dosen::count(),
                'admin_count' => Dosen::where('role', 'admin')->count(),
                'kaprodi_count' => Dosen::where('role', 'kaprodi')->count(),
                'dosen_count' => Dosen::where('role', 'dosen')->count(),
            ];
        });

        return response()->json($stats);
    }

    /**
     * Get recent activities
     */
    public function getRecentActivities()
    {
        $activities = [
            'mahasiswa' => Mahasiswa::latest()->take(5)->get(),
            'dosen' => Dosen::latest()->take(5)->get(),
        ];

        return response()->json($activities);
    }

    /**
     * Get system status
     */
    public function getSystemStatus()
    {
        $status = [
            'server' => true, // Simulate server status
            'database' => DB::connection()->getPdo() ? true : false,
            'security' => true, // Simulate security status
            'uptime' => '99.9%', // Simulate uptime
        ];

        return response()->json($status);
    }

    /**
     * Export dashboard data
     */
    public function exportData($type = 'pdf')
    {
        $data = [
            'stats' => [
                'total_mahasiswa' => Mahasiswa::count(),
                'total_dosen' => Dosen::count(),
                'admin_count' => Dosen::where('role', 'admin')->count(),
                'kaprodi_count' => Dosen::where('role', 'kaprodi')->count(),
                'dosen_count' => Dosen::where('role', 'dosen')->count(),
            ],
            'recent_mahasiswa' => Mahasiswa::latest()->take(10)->get(),
            'recent_dosen' => Dosen::latest()->take(10)->get(),
            'exported_at' => now()->format('Y-m-d H:i:s'),
        ];

        if ($type === 'json') {
            return response()->json($data);
        }

        // For PDF export, you would need to implement PDF generation
        // For now, return JSON
        return response()->json($data);
    }

    /**
     * Get chart data
     */
    public function getChartData()
    {
        // Generate sample chart data for the last 6 months
        $months = [];
        $mahasiswa = [];
        $dosen = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $months[] = $date->format('M');
            
            // Simulate data - replace with actual queries
            $mahasiswa[] = rand(50, 100);
            $dosen[] = rand(20, 50);
        }

        $chartData = [
            'labels' => $months,
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
        ];

        return response()->json($chartData);
    }

    /**
     * Check for new notifications
     */
    public function checkNotifications()
    {
        // Simulate checking for new notifications
        $hasNew = rand(0, 1) === 1;
        
        if ($hasNew) {
            $notifications = [
                'hasNew' => true,
                'count' => rand(1, 5),
                'message' => 'You have ' . rand(1, 5) . ' new notifications',
            ];
        } else {
            $notifications = [
                'hasNew' => false,
                'count' => 0,
                'message' => 'No new notifications',
            ];
        }

        return response()->json($notifications);
    }

    public function create()
    {
        // Optional: return view('admin.dashboard_create');
    }

    public function store(Request $request)
    {
        // Optional: logic to store dashboard data
    }

    public function show($id)
    {
        // Optional: return view('admin.dashboard_show', compact('id'));
    }

    public function edit($id)
    {
        // Optional: return view('admin.dashboard_edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Optional: logic to update dashboard data
    }

    public function destroy($id)
    {
        // Optional: logic to delete dashboard data
    }
} 