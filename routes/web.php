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

Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('home.contact');

$posts = [
    1 => [
        'is_new' => false,
        'has_comments' => true,
        'title' => 'Post about Laravel Migrations',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veniam expedita vero blanditiis, fuga, sed ratione libero tempore ad beatae inventore, quos iste est similique accusamus ea molestias dolorem labore.'
    ],
    2 => [
        'is_new' => true,
        'title' => 'Post about Apache start on MacOS',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veniam expedita vero blanditiis, fuga, sed ratione libero tempore ad beatae inventore, quos iste est similique accusamus ea molestias dolorem labore.'
    ],
    3 => [
        'is_new' => false,
        'has_comments' => true,
        'title' => 'Post about Laravel Routes',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias veniam expedita vero blanditiis, fuga, sed ratione libero tempore ad beatae inventore, quos iste est similique accusamus ea molestias dolorem labore.'
    ],
];

Route::prefix('/posts')->name('posts.')->group(function () use ($posts) {
    Route::get('/', function () use ($posts) {
        return view('post.index', ['posts' => $posts]);
    })->name('index');

    Route::get('{id}', function ($id) use ($posts) {
        abort_if(!isset($posts[$id]), 404);
        return view('post.show', ['id' => $id, 'post' => $posts[$id]]);
    })->where(['id' => '[0-9]+'])->name('show');
});




// Fun routes
Route::prefix('/fun')->name('fun.')->group(function () use ($posts) {
    Route::get('responses', function () use ($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('dummy', 'custom cookie', 3600);
    })->name('response');

    Route::get('redirect', function () {
        return redirect('/contact');
    })->name('redirect');

    Route::get('back', function () {
        return back();
    })->name('back');

    Route::get('named', function () {
        return redirect()->route('home.index');
    })->name('named');

    Route::get('away', function () {
        return redirect('https://youtube.com');
    })->name('away');

    Route::get('json', function () use ($posts) {
        return response()->json($posts);
    })->name('json');

    Route::get('download', function () {
        return response()->download(public_path('favicon.ico'), 'fav.ico', []);
    })->name('download');
});
