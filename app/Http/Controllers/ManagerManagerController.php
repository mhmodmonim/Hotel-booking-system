<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Storage;
use Psy\Util\Json;
use Spatie\Permission\Models\Role;
use DB;
use Auth;

class ManagerManagerController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['role:Admin']);
    }
    public function index(){           
        $user = Auth::guard('employee')->user();
        return view('admin.Managers.index' );
    } 
    public function get_data(){
        $Managers = Employee::role('Manager')->get();
        return datatables()->of($Managers)->toJson();
    }
    public function create(){
        return view('admin.Managers.create');
    }
    public function store(Request $request){

        $roleExist = DB::table('roles')->where('name', '=', 'Manager')->get();

        if(empty($roleExist))
        {
            dd('func');
            Role::create(['name' => 'Manager']);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' =>'required|mimes:jpg,jpeg',
            'National_ID' => 'required',
        ]);
        $path = $request->image->store('public/images');
        $manager  = new Employee;
        $manager->fill($request->except( ["image" , "employee_id"] ));
        $manager->image = $path;
        $manager->employee_id =Auth::guard('employee')->user()->id;
        $manager->password = bcrypt($request->password);
        $manager->save();
        $manager->assignRole('Manager');
        return redirect()->route('Managers.index')->
                with('success','Manager  added successfully');
    }
    public function delete(Request $request){
        if($request->ajax()){
            $manager =Employee::findOrFail($request->id)->delete();
            return response()->json([
                'res' => 'Manager deleted successfully'
                ]);
        }        
    }
    public function edit($id){
        $manager = Employee::findOrFail($id);
        return view('admin.Managers.edit',compact('manager'));
    }
    public function update(Request $request, $id){   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'National_ID' => 'required',
        ]);
        $manager = Employee::findOrFail($id);
        $manager->password = bcrypt($request->password);
        $manager->update($request->except("image"));
        if($request->hasFile("image")){
            Storage::delete($manager->image);
            $path = $request->image->store('public');
            $manager->image = $path;
        }
        $manager->save();
        return redirect()->route('Managers.index')
                ->with('success','Manager updated successfully');
    }
        public function render($request, Exception $exception)
        {
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            return "dddddd";
            }
        return parent::render($request, $exception);
        }

}
