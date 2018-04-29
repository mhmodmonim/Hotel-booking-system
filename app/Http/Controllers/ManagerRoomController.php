<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Employee;
use App\Room;
use App\Floor;
use App\Reservation;
use Auth;

use Storage;

class ManagerRoomController extends Controller
{
    public function index(){
        return view('admin.rooms.index');
    }

    public function get_data(){
        $Rooms = Room::all();
        return datatables()->of($Rooms)->toJson();
    }   
    public function delete(Request $request){
        if($request->ajax()){
            $relatdReserv = Reservation::where('room_id','=',$request->id)->count();
            if($relatdReserv > 0){
                return response()->json(['deleteStatus'=> false  ]); 
            }
            $Room =Room::findOrFail($request->id)->delete();
            return response()->json(['deleteStatus' => true]);
        }        
    }
    public function create(){
        $floors = Floor::all();
        return view('admin.rooms.create' , compact('floors'));
    }
    public function store(Request $request){
        $request->validate([
            'number' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'floor_id'=>'required',
        ]);
         $room = new Room;
         $room->number = $request->number;
         $room->price = $request->price;
         $room->capacity = $request->capacity;
         $room->floor_id = $request->floor_id;
         $room->employee_id = Auth::guard('employee')->user()->id  ;
         $room->save();
        return redirect()->route('rooms.index')->
                with('success','Room  added successfully');
    }

    public function edit($id){
        $room = Room::FindOrFail($id);  
        $floors = Floor::all();
        return view('admin.rooms.edit' , compact('room', 'floors'));
    }

    public function update(Request $request, $id){   
        $request->validate([
            'number' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'floor_id'=>'required',
        ]);
        $room =Room::findOrFail($id)->update($request->all());
        return redirect()->route('rooms.index')
                ->with('success','Room updated successfully');
    }


   
}
