<?php

Route::get('/user', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    return view('user.home');
})->name('user');

