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

Route::get('/',[\App\Http\Controllers\HomePage::class,'index'])->name('home');
Route::get('/services',[\App\Http\Controllers\HomePage::class,'services'])->name('services');
Route::get('/blogs/{id?}',[\App\Http\Controllers\HomePage::class,'blogs'])->name('blogs');
Route::get('/blog/search',[\App\Http\Controllers\HomePage::class,'search'])->name('blogsearch');
Route::get('/blog/{id}',[\App\Http\Controllers\HomePage::class,'blog'])->name('blogshow');
Route::get('/about',[\App\Http\Controllers\HomePage::class,'about'])->name('about');
Route::get('/contact',[\App\Http\Controllers\HomePage::class,'contact'])->name('contact');
Route::post('/contact/send',[\App\Http\Controllers\HomePage::class,'sendMessage'])->name('sendMessage');
Route::get('/faq',[\App\Http\Controllers\HomePage::class,'faq'])->name('faq');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])
->prefix('admin')
->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('admin');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/constant', function () {
        return view('admin.constant');
    })->name('constant');
    Route::get('/category', function () {
        return view('admin.category');
    })->name('category');

    Route::get('/messages', function () {
        return view('admin.messages');
    })->name('messages');

    Route::get('/blog/{catId?}', function ($catId = null) {
        return view('admin.blogs',compact(['catId']));
    })->name('blog');

    Route::get('/blog-add/{catId?}', function ($catId = null) {
        return view('admin.blog-add',compact(['catId']));
    })->name('blog-add');
    Route::get('/blog-edit/{id}', function ($id) {
        return view('admin.blog-edit',compact(['id']));
    })->name('blog-edit');
    Route::get('/testimonial', function () {
        return view('admin.testimonial');
    })->name('testimonial');

    Route::get('/statistics', function () {
        return view('admin.statistics');
    })->name('statistics');

    Route::get('/faq', function () {
        return view('admin.faq-control');
    })->name('faq-control');
});


