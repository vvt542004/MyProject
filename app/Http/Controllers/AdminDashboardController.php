<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        /* ===== THỐNG KÊ CƠ BẢN ===== */
        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'pending')->count();

        $approvedOrders = Order::where('status', 'approved')->count();

        $totalRevenue = Order::where('status', 'approved')->sum('total_price');

        $totalUsers = User::count();

        $todayOrders = Order::whereDate('created_at', today())->count();


        /* ===== BIỂU ĐỒ DOANH THU THEO THÁNG ===== */
        $monthlyRevenue = Order::select(
        DB::raw('YEAR(created_at) as year'),
        DB::raw('MONTH(created_at) as month'),
        DB::raw('SUM(total_price) as total')
    )
    ->where('status', 'approved')
    ->groupBy(
        DB::raw('YEAR(created_at)'),
        DB::raw('MONTH(created_at)')
    )
    ->orderBy(DB::raw('YEAR(created_at)'))
    ->orderBy(DB::raw('MONTH(created_at)'))
    ->get();

$months = [];
$revenues = [];

foreach ($monthlyRevenue as $item) {
    $months[] = 'Tháng ' . $item->month . '/' . $item->year;
    $revenues[] = $item->total;
}

        /* ===== TRẢ VIEW ===== */
        return view('Admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'approvedOrders',
            'totalRevenue',
            'totalUsers',
            'todayOrders',
            'months',
            'revenues'
        ));
    }
}
