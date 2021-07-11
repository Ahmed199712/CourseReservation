<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Setting;
use App\Category;

class myLoginController extends Controller
{
    public function login()
    {
      $setting = Setting::first();
      $categories = Category::all();

      return view('user.login' , [
        'setting' => $setting,
        'categories' => $categories
      ]);
    }

    public function doLogin()
    {
      if( auth()->guard('web')->attempt(['email' => request('email') , 'password' => request('password')]) )
      {
        Session::flash('success' , 'You LoggedIn Successfully');
        return redirect('/');
      }else{
        Session::flash('error' , 'Email or Password Incorrect !');
        return redirect('/login');
      }
    }

    public function logout()
    {
      auth()->guard('web')->logout();

      return redirect('/');
    }
}
