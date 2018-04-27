<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Reservation;
use DB;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
class ReservationController extends Controller
{
    public function index()
    {
        $rooms = DB::table('rooms')->whereNotIn('id', DB::table('reservation')->select('room_id'))->get();
        return view('reservation', [
            'availableRooms' => $rooms
        ]);
    }

    public function store(Request $request, $id)
    {

        $room = Room::where('id', '=', $id)->first();
        $accompany = ($request->accompany);
        $accompany = (int)$accompany;
        $capcity = $room->capacity;

        if ($accompany > $capcity) {
            return redirect()->route('booking', [$id])->with('failure', "invaild number");

        }


        $stripe = Stripe::setApiKey('sk_test_fxuN09h1C4FouxqXAriWon8J');


        try {
            $stripe->charges()->create([

                'currency' => 'USD',
                'amount' => $room->price,
                'source' => $request->stripeToken,
                'description' => 'book room number' . $room->number
            ]);
        } catch (\Exception $e) {
            dd($e);

            return redirect()->route('booking', $id)->with('cardproblem', 1);

        }



        Reservation::create([
        'paidPrice' => $room->price,
        'user_id' => 1,
        'room_id' => $room->id,
        'employee_id' => 1,

    ]);


        return redirect()->route('reservation');

    }
}


