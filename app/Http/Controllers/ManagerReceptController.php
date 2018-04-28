<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Storage;
use Psy\Util\Json;
use Auth;

class ManagerReceptController extends Controller
{
    public function index(){
        $user = Auth::guard('employee')->user();
        $loginAdminId = $user->id;
        $loginAdminRole = $user->getRoleNames();
        return view('admin.Receptionists.index' , compact('loginAdminRole', 'loginAdminId'));
    }

    public function get_data(){
        $Receptionists = Employee::role('Receptionist')
                    ->with('employee:name,id')->get();
        return datatables()->of($Receptionists)->toJson();
    }
    public function create(){
        $countries = countries();
        return view('admin.Receptionists.create' , compact('countries'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'country'=>'required',
            'image' =>'required',
            'National_ID' => 'required',
            'Gender' => 'required',
        ]);
        $path = $request->image->store('public');
        $Recept  = new Employee;
        $Recept->fill($request->except("image"));
        $Recept->image = $path;
        $Recept->password = bcrypt($request->password);
        $Recept->save();
        $Recept->assignRole('Receptionist');
        return redirect()->route('Receptionists.index')->
                with('success','Receptionists  added successfully');
    }
    public function delete(Request $request){
        if($request->ajax()){
            $Recept =Employee::findOrFail($request->id)->delete();
            return response()->json([
                'res' => 'Receptionist deleted successfully'
                ]);
        }        
    }

    public function Ban(Request $request){
        if($request->ajax()){
           $employee = Employee::findOrFail($request->id);
           if($employee->isBanned()){
                $employee->unban();
            }
           else {
                $employee->ban();  
           }
           return response()->json([
            'statusBan' => $employee->isBanned()
            ]);
        }
    }
    public function edit($id){
        $Recept = Employee::findOrFail($id);
        return view('admin.Receptionists.edit',compact('Recept'));
    }
    public function update(Request $request, $id){   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'country'=>'required',
            'National_ID' => 'required',
            'Gender' => 'required',
        ]);
        $Recept = Employee::findOrFail($id);
        $Recept->password = bcrypt($request->password);
        $Recept->update($request->except("image"));
        if($request->hasFile("image")){
            Storage::delete($Recept->image);
            $path = $request->image->store('public');
            $Recept->image = $path;
        }
        $Recept->save();
        return redirect()->route('Receptionists.index')
                ->with('success','Receptionists updated successfully');
    }   
        
}
