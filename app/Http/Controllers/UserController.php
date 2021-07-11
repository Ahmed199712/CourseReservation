<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;
use App\Category;
use App\User;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
   
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }

    public function myProfile(Request $request)
    {
        $setting = Setting::first();
        $categories = Category::all();
        $user = auth()->guard('web')->user();

        return view('user.profile' , compact('setting','categories','user'));
    }

    public function updateProfile(Request $request)
    {
        $id = auth()->guard('web')->user()->id;

        $this->validate($request , [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required'
        ]);

        $user = User::find($id);

        if( $request->avatar ){

            if( $user->avatar != 'uploads/students/default.png' ){
                unlink($user->avatar);
            }
            
            Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/students/' . $request->avatar->hashName());
            $user->avatar = 'uploads/students/' . $request->avatar->hashName();
        }


        $user->name = $request->name;
        $user->email = $request->email;
        if( !empty($request->password) ){
            $user->password = bcrypt($request->password);
        }
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->address = $request->address;
        $user->save();

        session()->flash('success' , 'Profile Updated Successfully...');
        return redirect()->back();

    }

}
