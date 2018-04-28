<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
class RoomsController extends Controller
{
    public function index($id)
    {
        $room = Room::find($id);
        return view('booking', [
            'room' => $room
        ]);
    }
}
