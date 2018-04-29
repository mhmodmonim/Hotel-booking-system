<?php

namespace App\Http\Controllers;

use App\Reservation;
use DB;
use Auth;
use Illuminate\Http\Request;

class ClientReservations extends Controller
{
    public function index()
    {
        return view('clientReservation');
    }

    public function get_data()
    {
        $query = DB::table('reservations')
            ->join('users', 'reservations.user_id', '=' , 'users.id')
            ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
            ->select('reservations.paidPrice', 'reservations.clientAccompanyNumber', 'rooms.number', 'users.id')
            ->where('users.id', '=', Auth::guard('user')->user()->id )
            ->get();
        return datatables()->of($query)->toJson();

    }
}
