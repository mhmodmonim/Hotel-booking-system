<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.receptionist.index');
    }

    public function show()
    {
        return datatables()->of(User::query())->toJson();
    } 

    public function store()
    {
        dd("store");
    }
}
