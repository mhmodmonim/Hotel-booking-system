<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\User;

class DatatablesController extends Controller
{
    public function index()
    {
        return view('admin.test', [

                'anyData'  => 'datatables.data',
                'index' => 'datatables',
        ]);
    }

    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }

}
