<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\DataTables\UsersDataTablesEditor;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use DataTables;
use Yajra\DataTables\QueryDataTable;
use App\Notifications\InvoicePaid;
use App\Events\LoginEvent;
use Illuminate\Auth\Events\Login;




class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.receptionist.index');
    }

    public function approvedIndex(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.receptionist.approved');
    }

    public function reservationIndex(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.receptionist.reservation');
    }

    public function  get_data()
    {
        $query = DB::table('users')
                    ->whereNotIn('id', DB::table('model_has_permissions')->select('model_id'))
                    ->get();
        return DataTables::of($query)->toJson();


    }

    public function get_data_approved()
    {
        $query = DB::table('model_has_permissions')->leftJoin('users', 'model_has_permissions.model_id', '=', 'users.id')->get();
        return DataTables::of($query)->toJson();
    }

    public function get_data_reserved()
    {
        //$user = Auth::guard(employee)->user()->id();
        $query = DB::table('reservation')
            ->join('users', 'reservation.user_id', '=', 'users.id')
            ->join('rooms', 'reservation.room_id', '=', 'rooms.id')
            ->select('reservation.paidPrice','reservation.clientAccompanyNumber','rooms.number' , 'users.name')
            ->where('users.employee_id', '=', 3)
            ->get();
        return DataTables::of($query)->toJson();
    }

    public function store(UsersDataTablesEditor $editor)
    {
        return $editor->process(request());
    }

    public function edit($id , InvoicePaid $invoice)
    {
        $user = User::find($id);
        $permission = Permission::create(['name' => 'Approved']);
        $user->givePermissionTo('Approved');
        $user->sendEmailNotification($invoice);
        return redirect('admin/receptionists');
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return Redirect(route('clients.pending'));
    }

    public function loginCheck($id)
    {
        $user = User::find($id);
        event(new Login($user));
    }

}
