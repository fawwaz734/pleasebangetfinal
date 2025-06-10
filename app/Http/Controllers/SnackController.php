<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SnackController extends Controller
{
    public function index()
    {
        // Ambil semua produk, bisa tambahkan filter kategori jika ada
        $snacks = Product::all();
        return view('snacks.index', compact('snacks'));
    }
}