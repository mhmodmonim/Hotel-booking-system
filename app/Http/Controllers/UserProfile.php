<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserProfile extends Controller
{
    public function index()
    {
        $id = Auth::guard('user')->user()->id;
        $user =  User::find($id);
        return view('useredit',[
            'user' => $user
        ]);
    }

    public function update(Request $request , $id)
    {
            $user = User::findOrFail($id);
            $user->fill($request->only('name','email', 'mobile', 'gender', 'country', 'image'))->save();
        return redirect(route('userprofile'));

    }
}
