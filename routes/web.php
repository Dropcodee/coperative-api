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

Auth::Routes();
Route::get('/', function () {
    return view('auth.login');
});
# admin login page logic
Route::post('loginRequest', 'Admin\AdminAuthController@login')->name('loginRequest');

# admin page dashboard
Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware('role:admin|super-admin|developer');
Route::namespace('Admin')->prefix('admin')->group(function() {
# view all members
Route::get('members', 'UserController@members')
    ->name('members')
    ->middleware('permission:view all users');

});
