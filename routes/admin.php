<?php

Route::get('/admin', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    return view('admin.index');
})->name('admin');

