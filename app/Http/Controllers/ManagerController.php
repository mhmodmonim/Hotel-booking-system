<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Employee;
use App\User;
use Auth;
use Yajra\Datatables\Datatables;



class ManagerController extends Controller
{ 
    public function __construct()
    {
        // $this->middleware(['role:Admin|Manager']);
    }    
    public function index(){ 
        $user = Auth::guard('employee')->user();
        return view('admin.clients.index' , compact('user'));
    }
    public function  get_data(){
        $loginEmpId = Auth::guard('employee')->user()->id;
        $clients = User::with('employee:name,id')->get();
        return datatables()->of($clients)->toJson();
    }
    public function edit($id){
        $countries = countries();
        $client = User::findOrFail($id);
        return view('admin.clients.edit',compact('client','countries'));
    }
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'mobile'=>'required|min:11',
            'image'=>'mimes:jpg,jpeg',
            'country'=>'required',
            
        ]);
        $user=new User;
        $path = $request->image->store('public/images');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->country = $request->country;
        $user->image = $path;
        $user->employee_id=  Auth::guard('employee')->user()->id; 
        $user->save();
        return redirect()->route('clients.index')->
                with('success','Client  added successfully');
    }
    public function delete(Request $request){
        if($request->ajax()){   
            $user =User::findOrFail($id)->delete($request->id);
            return response()->json("sssss");
        } 
    }

    public function create(){
        $countries = countries();
        return view('admin.clients.create',compact('countries'));
    }
    
    
    public function update(Request $request, $id){   
        $request->validate([
            'name' => 'required',
            'email' => 'required|exists:users,email',
            'gender' => 'required',
            'mobile'=>'required|min:11',
            'country'=>'required'
        ]);
        $user =User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->country = $request->country;
        if($request->hasFile('image')){
            Storage::delete($user->image);
            $path = $request->image->store('public/images');   
        }
        $user->save();
        return redirect()->route('clients.index')
                ->with('success','Client updated successfully');
    }

}
