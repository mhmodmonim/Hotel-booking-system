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
    return view('index');
})->name('home');

Route::get('reservation', 'ReservationController@index')->name('reservation');

Route::get('admin', function () {
   return view('admin.index');
});

Route::get('reservation/room/{id}', 'RoomsController@index')->name('booking');
Route::post('reservation/payment/{id}', 'ReservationController@store')->name('payment');


Route::get('admin/emp/getdata', 'EmployeesController@get_data')->name('employees.index.dataTables');
Route::get('admin/emp', 'EmployeesController@index');
// data pages only which are then used by ajax from blades
Route::get('admin/receptionists/show','UsersController@get_data')->name('clients.index.dataTables');
Route::get('admin/receptionists/show/approved','UsersController@get_data_approved')->name('clients.approvedIndex.dataTables');
Route::get('admin/receptionists/show/reservation','UsersController@get_data_reserved')->name('clients.reservation.dataTables');
//receptionist blades using datapages using ajax
Route::get('admin/receptionists','UsersController@index')->name('clients.pending');
Route::get('admin/receptionists/approved','UsersController@approvedIndex')->name('clients.approved');
Route::get('admin/clients/reservation','UsersController@reservationIndex')->name('clients.reservation');
Route::get('admin/add/{id}','UsersController@store');


Route::get('clients/{id}/edit','UsersController@edit')->name('clients.edit');
Route::get('clients/{id}/delete','UsersController@delete')->name('clients.delete');
Route::get('employess/{id}/edit','EmployeesController@edit')->name('employees.edit');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout')->name('employeelogout');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});