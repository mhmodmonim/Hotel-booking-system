<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Floor;
use \App\Room;
use Auth;

class ManagerFloorController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['role:Admin|Manager|Receptionist']);
    }
    public function index(){
        $user = Auth::guard('employee')->user();
        $loginAdminId = $user->id;
        $loginAdminRole = $user->getRoleNames();
        return view('admin.floors.index',compact('loginAdminId','loginAdminRole' ));
    }
    public function  get_data(){
        $floors = Floor::with('employee:name,id')->get();
        return datatables()->of($floors)->toJson();
    }
    public function edit($id){
        $floor = Floor::findOrFail($id);
        return view('admin.floors.edit',compact('floor'));
    }
    public function create(){
        return view('admin.floors.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $floor=new Floor;
        $floor->name = $request->name;
        $floor->number = mt_rand(1000, 9999);
        $floor->save();
        return redirect()->route('floors.index')->
                with('success','Floor  added successfully');
    }
    public function delete(Request $request)
    {    
        if($request->ajax()){
            $relatedRooms =Room::where('floor_id','=' , $request->id)->count();
           if($relatedRooms > 0){
                return response()->json(['deleteStatus'=> false  ]);
           }
               $floor = Floor::Find($request->id)->delete();
                return response()->json(['deleteStatus'=> true  ]);
           }
    }    
    

   
    

    
    public function update(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required',
        ]);
        $floor =Floor::findOrFail($id);
        $floor->name = $request->name;
        $floor->save();
        return redirect()->route('floors.index')
                ->with('success','floors updated successfully');
    }
    
}
