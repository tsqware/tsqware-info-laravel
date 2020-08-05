<?php

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


Route::resource('contacts', 'ContactController');
Route::resource('posts', 'PostController');

Route::prefix('admin')->namespace('Admin')->group(function()
{
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    /*Route::get('/admin', function () {
        return view('admin.welcome');
    })->name('admin_home');*/
    Route::resource('/admin/contacts', 'ContactController');
    Route::resource('/admin/posts', 'PostController');
    
    Auth::routes(['register' => false]);
    Route::get('/', 'HomeController@index')->name('admin_home');
    

});

Route::get('/', 'WelcomeController@index')->name('home');
Route::get('/{slug}', 'WelcomeController@index')->name('show_post');





