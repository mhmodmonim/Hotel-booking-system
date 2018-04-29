<?php

Route::get('/manager', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('manager')->user();

    //dd($users);

    return view('user.auth.login');
})->name('manager');

