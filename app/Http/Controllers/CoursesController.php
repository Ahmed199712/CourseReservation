<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Setting;
use App\Category;
use App\Reservation;
use App\User;
use Sessin;
use Intervention\Image\Facades\Image;

class CoursesController extends Controller
{
    
    public function index()
    {
        $courses = Course::orderBy('created_at','desc')->paginate(6);
        $setting = Setting::first();
        $categories = Category::all();

        return view('user.courses.index' , [
          'courses' => $courses ,
          'setting' => $setting,
          'categories' => $categories
        ]);
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

      $course = Course::findOrFail($id);
      $setting = Setting::first();
      $categories = Category::all();

      return view('user.courses.show' , [
        'course' => $course ,
        'setting' => $setting,
        'categories' => $categories
      ]);
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
        $userID = auth()->guard('web')->user()->id;

        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        $user = User::find($userID);
        $user->register_course = 0;
        $user->save();
        
        session()->flash('success','Reservation Deleted Successfully...');
        return redirect()->back();

    }

    public function category($id)
    {
        $courses = Course::where('category_id' , $id)->get();
        $category = Category::find($id);
        $setting = Setting::first();
        $categories = Category::all();

        return view('user.courses.category' , compact('courses','category','categories','setting'));
    }

    public function myCourses(Request $request)
    {
        $setting = Setting::first();
        $categories = Category::all();
        $id = auth()->guard('web')->user()->id;
        $reservations = Reservation::where('user_id',$id)->get();

        return view('user.courses.myCourses' , compact('setting','reservations','categories'));        
    }

    public function registerCourse(Request $request , $id)
    {

        $userID = auth()->guard('web')->user()->id;
        

        $registerCourse = new Reservation;
        $registerCourse->user_id = $userID;
        $registerCourse->course_id = $id;
        $registerCourse->active = 0;
        $registerCourse->register_course = 1;
        $registerCourse->save();

        $user = User::find($userID);
        $user->register_course = 1;
        $user->save();

        session()->flash('success' , 'Course Registered Successfully ...');
        return redirect()->back();
        
    }
}
