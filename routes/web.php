<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\AdminDashboardController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SnackController;
use App\Models\Product;

// Halaman depan: tampilkan produk terbaru
Route::get('/', function () {
    $products = Product::latest()->take(6)->get();
    return view('welcome', compact('products'));
})->name('home');

// Route untuk login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Route dashboard user biasa
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route profile user biasa
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route admin (hanya untuk admin, dengan prefix dan middleware)
Route::middleware(['auth', 'AdminMiddleware'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/most-bought-products', [AdminDashboardController::class, 'getMostBoughtProducts'])->name('most.bought.products');
    Route::resource('products', ProductController::class);
});

// Resource route untuk forADMIN.products.* agar Blade tidak error
// Bagian ini penting agar semua route CRUD (index, create, store, show, edit, update, destroy) 
// dengan nama forADMIN.products.* tersedia untuk kebutuhan view admin
Route::resource('foradmin/products', ProductController::class)->names([
    'index' => 'forADMIN.products.index',
    'create' => 'forADMIN.products.create',
    'store' => 'forADMIN.products.store',
    'show' => 'forADMIN.products.show',
    'edit' => 'forADMIN.products.edit',
    'update' => 'forADMIN.products.update',
    'destroy' => 'forADMIN.products.destroy',
]);

Route::get('/snacks', [SnackController::class, 'index'])->name('snacks.index');

// Route untuk halaman permen (contoh halaman lain)
Route::get('/permen', function () {
    return view('permen.Permen');
})->name('permen');

require __DIR__.'/auth.php';