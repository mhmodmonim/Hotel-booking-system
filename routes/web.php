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
Route::get('profile/edit', 'UserProfile@index')->name('userprofile');
Route::post('profile/{id}', 'UserProfile@update')->name('profile.update');

Route::get('reservation', 'ReservationController@index')->name('reservation');
Route::get('admin', function () {
   return view('admin.index');
});

//added section
Route::get('employee', function () {
  return view('employee.auth.login');
});

Route::get('manager', function () {
  return view('employee.auth.login');
});

Route::get('receptionist', function () {
  return view('employee.auth.login');
});

Route::get('user', function () {
  return view('employee.auth.login');
});

//end added section

Route::group([
  'middleware'=>'employees'
],
function () {

Route::get('clients', 'ManagerController@index')->name('clients.index');
Route::get('clientsData', 'ManagerController@get_data')->name('clientsData');
Route::get('clients/create', 'ManagerController@create')->name('clients.create');
Route::post('clients/store', 'ManagerController@store')->name('clients.store');
Route::get('clients/{id}/Edit','ManagerController@edit')->name('clients.Edit');
Route::patch('clients/{id}/update', 'ManagerController@update')->name('clients.update');
Route::post('clients/delete','ManagerController@delete')->name('clients.destroy');



Route::group(['middleware'=>'employees'],function () {
    Route::get('Managers', 'ManagerManagerController@index')->name('Managers.index');
    Route::get('ManagersData', 'ManagerManagerController@get_data')->name('ManagersData');
    Route::get('Managers/create', 'ManagerManagerController@create')->name('Managers.create');
    Route::post('Managers/store', 'ManagerManagerController@store')->name('Managers.store');
    Route::get('Managers/{id}/edit','ManagerManagerController@edit')->name('Managers.edit');
    Route::patch('Managers/{id}/update', 'ManagerManagerController@update')->name('Managers.update');
    Route::post('Managers/delete','ManagerManagerController@delete')->name('Managers.delete');  
    
    Route::get('Receptionists', 'ManagerReceptController@index')->name('Receptionists.index');
    Route::get('ReceptionistsData', 'ManagerReceptController@get_data')->name('ReceptionistsData');
    Route::post('Receptionists/{id}/ban', 'ManagerReceptController@Ban')->name('Receptionists.ban');
    Route::get('Receptionists/create', 'ManagerReceptController@create')->name('Receptionists.create');
    Route::post('Receptionists/ban', 'ManagerReceptController@Ban')->name('Receptionists.ban');
    Route::post('Receptionists/store', 'ManagerReceptController@store')->name('Receptionists.store');
    Route::get('Receptionists/{id}/edit','ManagerReceptController@edit')->name('Receptionists.edit');
    Route::patch('Receptionists/{id}/update', 'ManagerReceptController@update')->name('Receptionists.update');
    Route::post('Receptionists/delete','ManagerReceptController@delete')->name('Receptionists.delete');

    Route::get('floors', 'ManagerFloorController@index')->name('floors.index');
    Route::get('floorsData', 'ManagerFloorController@get_data')->name('floorsData');
    Route::get('floors/create', 'ManagerFloorController@create')->name('floors.create');
    Route::post('floors/store', 'ManagerFloorController@store')->name('floors.store');
    Route::get('floors/{id}/edit','ManagerFloorController@edit')->name('floors.edit');
    Route::patch('floors/{id}/update', 'ManagerFloorController@update')->name('floors.update');
    Route::post('floors/delete','ManagerFloorController@delete')->name('floors.delete');

    Route::get('rooms', 'ManagerRoomController@index')->name('rooms.index');
    Route::get('roomsData', 'ManagerRoomController@get_data')->name('roomsData');
    Route::get('rooms/create', 'ManagerRoomController@create')->name('rooms.create');
    Route::post('rooms/store', 'ManagerRoomController@store')->name('rooms.store');
    Route::get('rooms/{id}/edit','ManagerRoomController@edit')->name('rooms.edit');
    Route::patch('rooms/{id}/update', 'ManagerRoomController@update')->name('rooms.update');
    Route::post('rooms/delete','ManagerRoomController@delete')->name('rooms.delete');


});

Route::get('reservation/room/{id}', 'RoomsController@index')->name('booking');
Route::get('client/reservation/', 'ClientReservations@index')->name('client.reservation');
Route::get('client/reservation/data', 'ClientReservations@get_data')->name('client.reservation.data');
Route::post('reservation/payment/{id}', 'ReservationController@store')->name('payment');

Route::get('admin/emp/getdata', 'EmployeesController@get_data')->name('employees.index.dataTables');
Route::get('admin/emp', 'EmployeesController@index');

//route employees from the home page to admin area
Route::get('admin/', 'DashboardController@index')->name('dashboard');


// data pages only which are then used by ajax from blades
Route::get('admin/receptionists/show','UsersController@get_data')->name('clients.index.dataTables');
Route::get('admin/receptionists/show/approved','UsersController@get_data_approved')->name('clients.approvedIndex.dataTables');
Route::get('admin/receptionists/show/reservation','UsersController@get_data_reserved')->name('clients.myreservation.dataTables');
//receptionist blades using datapages using ajax
Route::get('admin/receptionists','UsersController@index')->name('clients.pending');
Route::get('admin/receptionists/approved','UsersController@approvedIndex')->name('clients.approved');
Route::get('admin/clients/reservation','UsersController@reservationIndex')->name('clients.reservation');
Route::get('admin/add/{id}','UsersController@store');


Route::get('clients/{id}/edit','UsersController@edit')->name('clients.edit');
Route::get('clients/{id}/delete','UsersController@delete')->name('clients.delete');
Route::get('employess/{id}/edit','EmployeesController@edit')->name('employees.edit');
});
Auth::routes();

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout')->name('employeelogout');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request.emp');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset')->name('password.email.emp');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset.emp');
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