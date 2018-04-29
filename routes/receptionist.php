<?php

Route::get('/receptionist', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('receptionist')->user();

    //dd($users);

    return view('user.auth.login');
})->name('receptionist');

