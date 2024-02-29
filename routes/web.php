<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\adminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingpageController::class, 'index'])->name('index');

Route::controller(LandingpageController::class)->group(function(){
    //Go To Detail Product
    Route::get('/detail_product/{id}', 'detail_product')->name('detail_product');
    //Go To Detail Article
    Route::get('/detail_article/{id}', 'detail_article')->name('detail_article');
});

Route::controller(adminController::class)->group(function(){
    Route::get('/admin', 'login')->name('login');
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    Route::get('/admin/product', 'product')->name('product');
    Route::get('/admin/article', 'article')->name('article');
    Route::get('/admin/list_admin', 'admins')->name('admins');

    //Login
    //Action Login
    Route::post('/admin/login/action_login', 'action_login')->name('action_login');
    //Action Logout
    Route::post('/admin/logout', 'action_logout')->name('action_logout');

    //Admin
    // Go To Form Add Admin
    Route::get('/admin/list_admin/form_admin', 'form_admin')->name('form_admin');
    // Create New Admin
    Route::post('/admin/list_admin/create_admin', 'create_admin')->name('create_admin');
    // Delete Admin
    Route::delete('/admin/list_admin/delete_admin/{id}', 'delete_admin')->name('delete_admin');
    //Go To Update Page Admin
    Route::get('/admin/list_admin/update_admin/{id}', 'update_admin')->name('update_admin');
    //Edit Data Admin 
    Route::post('/admin/list_admin/edit_admin/{id}', 'edit_admin')->name('edit_admin');

    //Product
    // Create New Product
    Route::post('/admin/product/create_product', 'create_product')->name('create_product');
    // Delete Product
    Route::delete('/admin/product/delete_product/{id}', 'delete_product')->name('delete_product');
    //Go To Update Page Product
    Route::get('/admin/product/update_product/{id}', 'update_product')->name('update_product');
    //Edit Data Product 
    Route::post('/admin/product/edit_product/{id}', 'edit_product')->name('edit_product');

    //Article
    // Create New Article
    Route::post('/admin/article/create_article', 'create_article')->name('create_article');
    // Delete Article
    Route::delete('/admin/article/delete_article/{id}', 'delete_article')->name('delete_article');
    //Go To Update Page Article
    Route::get('/admin/article/update_article/{id}', 'update_article')->name('update_article');
    //Edit Data Article 
    Route::post('/admin/article/edit_article/{id}', 'edit_article')->name('edit_article');

});
