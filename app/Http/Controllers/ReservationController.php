<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
class ReservationController extends Controller
{
    public function index ()
    {
        $rooms = Room::all();
        return view('reservation', [
            'availableRooms' => $rooms
        ]);
    }
}
