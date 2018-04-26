<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ClientReservations extends Controller
{
    public function index()
    {
        return view('clientReservation');
    }

    public function get_data()
    {
        return datatables()->of(Reservation::all() )->toJson();

    }
}
