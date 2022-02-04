<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomePage@home') -> name('home');
//login-logout-register
Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

//chiamata axios
Route::get('/emps/list', 'HomePage@apiGetEmps') -> name('api.getemps');

Route::get('/emp/delete/{id}', 'HomePage@apiDelEmp') -> name('api.DelEmp');
