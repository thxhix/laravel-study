<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/single', AboutController::class);

Route::resource('posts', PostsController::class)->only(['index', 'show']);

Route::get('/login', function() {
    return 'You are not a User!';
})->name('login');


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
