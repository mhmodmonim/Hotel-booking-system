<?php


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Employee;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin', function () {
   return view('admin.index');
});


//Route::get('admin/roles', function () {
//
//
//
//    $emp = Employee::all();
//    $datauser = datatables(User::all())->toJson();
////    dd($emp->hasRole('manager'));
//    return view('admin.test', [
//        'emp' => $datauser
//    ]);
//
//});

Route::get('admin/emp/getdata', 'EmployeesController@get_data');
Route::get('admin/emp', 'EmployeesController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
