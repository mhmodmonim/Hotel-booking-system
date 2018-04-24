<?php

namespace App\Http\Controllers;
use App\Employee;
use Yajra\Datatables\Datatables;
use App\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('admin.test');
    }

    public function  get_data()
    {
        return datatables()->of(User::query())->toJson();

    }

    public function edit($id)
    {
    	dd('welcome to edit',$id);
    }
}
