<?php

Route::get('/', function () {
    return view('frontend.pages.home');
})->middleware('check_token');


Route::get('/administration', [App\Http\Controllers\WebsiteController::class, 'all_employee'])->name('all_employee');
Route::get('/administration/{category}', [App\Http\Controllers\WebsiteController::class, 'group_employee'])->name('group_employee');

Route::get('/notices', [App\Http\Controllers\WebsiteController::class, 'all_notice'])->name('all_notice');
Route::get('/{pageSlug}/all', [App\Http\Controllers\WebsiteController::class, 'menu_item_list'])->name('menu_item_list');
Route::get('/{slug}/details/{id}', [App\Http\Controllers\WebsiteController::class, 'getNoticeDetailsBynoticeId'])->name('menu_details');

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
