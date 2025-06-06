<?php

namespace App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalOrders = OrderDetail::count();
        $totalProducts = Product::count();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
        ]);
    }

    public function getMostBoughtProducts()
    {
        // Get total counts
        $totalUsers = User::count();
        $totalOrders = OrderDetail::count();
        $totalProducts = Product::count();

        // Assuming you have a pivot table for orders and products
        // Adjust the query according to your database structure
        $mostBoughtProducts = Product::join('order_details', 'products.id', '=', 'order_details.product_id')
            ->select('products.*', DB::raw('COUNT(order_details.id) as order_count'))
            ->groupBy('products.id', 'products.name', 'products.price', 'products.description', 'products.image')
            ->orderBy('order_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'mostBoughtProducts' => $mostBoughtProducts,
        ]);
    }
}
