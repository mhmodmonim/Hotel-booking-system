<?php

Route::get('/employee', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    return view('employee.auth.login');
})->name('employee');

