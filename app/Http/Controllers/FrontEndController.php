<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Course;
use App\Category;
use App\User;
use App\Comment;
use App\Reservation;
use App\Classe;

class FrontEndController extends Controller
{
    public function index()
    {
      $setting = Setting::first();
      $courses = Course::orderBy('created_at','desc')->take(6)->get();
      $categories = Category::all();
      $total_courses = Course::all();
      $total_students = User::where('type',0)->get();
      $total_instructors = User::where('type',1)->get();
      $total_comments = Comment::all();
      $total_reservations = Reservation::all();
      $total_classes = Classe::all();

      return view('user.index' , [
        'setting' => $setting,
        'courses' => $courses,
        'categories' => $categories,
        'total_courses' => $total_courses,
        'total_students' => $total_students,
        'total_instructors' => $total_instructors,
        'total_comments' => $total_comments,
        'total_reservation' => $total_reservations,
        'total_classes' => $total_classes
      ]);
    }

    public function about()
    {
      $setting = Setting::first();
      $categories = Category::all();

      return view('user.pages.about' , [
        'setting' => $setting,
        'categories' => $categories
      ]);
    }

    public function contact()
    {
      $setting = Setting::first();
      $categories = Category::all();

      return view('user.pages.contact' , [
        'setting' => $setting,
        'categories' => $categories
      ]);
    }

    public function services()
    {
      $setting = Setting::first();
      $categories = Category::all();

      return view('user.pages.services' , [
        'setting' => $setting,
        'categories' => $categories
      ]);
    }
}
