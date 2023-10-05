<?php

Route::get('/', function () {
    return view('frontend.pages.home');
})->middleware('check_token');
