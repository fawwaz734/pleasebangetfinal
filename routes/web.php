<?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController\AdminDashboardController;
// use App\Http\Controllers\AdminController\ProductController;





// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//     Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
//         Route::get('/', [AdminDashboardController::class, 'index'])->name('AdminDashboard');
//         Route::get('/most-bought-products', [AdminDashboardController::class, 'getMostBoughtProducts'])->name('most.bought.products');

//         Route::resource('products', ProductController::class); 
//     });
// });

// Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
//     ->middleware('guest')
//     ->name('login');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/', [App\Http\Controllers\AdminController\AdminDashboardController::class, 'index'])->name('dashboard');
//     Route::get('/most-bought-products', [App\Http\Controllers\AdminController\AdminDashboardController::class, 'getMostBoughtProducts'])->name('most.bought.products');

//     Route::resource('products', App\Http\Controllers\AdminController\ProductController::class);
 
// });


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\AdminDashboardController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
Route::get('/', function () {
    return view('welcome');
});

// Route untuk login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');
    // return redirect()->route('dashboard');

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

// Route admin (hanya satu group, tidak duplikat)
Route::middleware(['auth', 'AdminMiddleware'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('AdminDashboard');
    Route::get('/most-bought-products', [AdminDashboardController::class, 'getMostBoughtProducts'])->name('most.bought.products');
    Route::resource('products', ProductController::class);
});
 Route::get('/permen', function () {
    return view('permen.Permen');
})->name('permen');


require __DIR__.'/auth.php';

