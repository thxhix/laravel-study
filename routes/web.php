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

Route::get('/', function () {
    return view('welcome');
})->name('home.index');

Route::get('/contact', function () {
    return '<h1>Contact Page</h1>';
})->name('home.contact');

Route::get('/posts/{id}', function ($id) {
    return 'We see Post with id: ' . $id;
})->where(['id' => '[0-9]+'])->name('posts.show');

Route::get('/posts-recent/{date?}', function ($date = '01-01-2022') {
    return 'List of posts with date ' . $date;
})->name('posts.recent');
