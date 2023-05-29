<?php

use App\Http\Controllers\WebLoginController;
use App\Http\Controllers\WebProductController;
use App\Http\Controllers\WebRegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//  Halaman home
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home',
    ]);
});

// Halaman about
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Bayu",
        "email" => "bayuharimurti2@gmail.com",
        "active" => 'about',
        "image" => "kaltara.png",
    ]);
});

// Haaman semua produk
Route::get('/products', [WebProductController::class, 'index']);

// Halaman detail produk
Route::get('products/{product:slug}', [WebProductController::class, 'show']);

// Halaman seluruh kategory
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Product Categoies',
        "active" => 'categories',
        'categories' => Category::all(),
    ]);
});

// Halaman Login
Route::get('/login', [WebLoginController::class, 'index']);

// Halaman Register
Route::get('/register', [WebRegisterController::class, 'index']);
// Registrasi User
Route::post('/register', [WebRegisterController::class, 'store']);

// Halaman produk per kategory
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('products', [
//         'title' => "Produk dengan kategori : $category->category_name",
//         "active" => 'categories',
//         'products' => $category->products->load('category', 'user'),
//     ]);
// });

// Halama produk per producer
// Route::get('/producer/{user:username}', function (User $user) {
//     return view('products', [
//         'title' => "Produk buatan produsen : $user->name",
//         "active" => 'products',
//         'products' => $user->products->load('category', 'user'),
//     ]);
// });
