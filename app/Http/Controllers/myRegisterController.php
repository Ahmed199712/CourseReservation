<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Setting;
use Session;
use App\Category;

class myRegisterController extends Controller
{
  public function register()
  {
    $setting = Setting::first();
    $categories = Category::all();

    return view('user.register' , [
      'setting' => $setting,
      'categories' => $categories
    ]);
  }

  public function doRegister(Request $request)
  {

    $this->validate($request , [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
      'confirm_password' => 'same:password',
      'phone' => 'required',
      'address' => 'required',
      'age' => 'required',
      'gender' => 'required',
      'type' => 'required'
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->age = $request->age;
    $user->gender = $request->gender;
    $user->type = $request->type;
    $user->save();

    auth()->login($user);

    Session::flash('success' , 'Account Created Successfully');

    return redirect('/');
  }
}
