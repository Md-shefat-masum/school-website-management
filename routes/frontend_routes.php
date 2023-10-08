<?php

Route::get('/', function () {
    return view('frontend.pages.home');
})->middleware('check_token');

Route::get('/notice/{id}', [App\Http\Controllers\WebsiteController::class, 'getNoticeBynoticeId']);
Route::get('/notice-details/{id}', [App\Http\Controllers\WebsiteController::class, 'getNoticeDetailsBynoticeId']);

Route::get('/news', [App\Http\Controllers\NewsController::class, 'getNews']);
Route::get('/news-by-category/{catId}', [App\Http\Controllers\NewsController::class, 'getNewsByCategory']);
Route::get('/news-details/{id}', [App\Http\Controllers\NewsController::class, 'getNewsById']);
Route::get('/news-search', [App\Http\Controllers\NewsController::class, 'searchNews'])->name('news.search');
Route::get('/submit-news-comment', [App\Http\Controllers\NewsController::class, 'submitBlogCommnet'])->name('submit-news-comment');

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'getBlogs']);
Route::get('/blog-by-category/{catId}', [App\Http\Controllers\BlogController::class, 'getBlogsByCategory']);
Route::get('/blog-details/{id}', [App\Http\Controllers\BlogController::class, 'getBlogById']);
Route::get('/blog-search', [App\Http\Controllers\BlogController::class, 'searchBlog'])->name('blogs.search');
Route::get('/submit-blog-comment', [App\Http\Controllers\BlogController::class, 'submitBlogCommnet'])->name('submit-blog-comment');


Route::get('gallery/photo', [App\Http\Controllers\GalleryController::class, 'getAllGalleryPhotos']);
Route::get('gallery/video', [App\Http\Controllers\GalleryController::class, 'getAllGalleryVideos']);
