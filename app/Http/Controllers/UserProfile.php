<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Storage;

class UserProfile extends Controller
{
    public function index()
    {
        $id = Auth::guard('user')->user()->id;
        $user = User::find($id);
        return view('useredit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $image = "";
        $user = User::find($id);
        if (empty($data['image'])) {
           $image = "discover.jpg";
        } else {
            $image = $request->image->getClientOriginalName();

            $path = Storage::putFileAs('public/images', $request->image, $image);


        }


        $user->fill(array('name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'country' => $request->country,
            'image' => $image
        ))->save();


        return redirect(route('userprofile'));

    }
}
