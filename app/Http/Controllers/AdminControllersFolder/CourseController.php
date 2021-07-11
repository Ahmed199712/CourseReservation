<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Category;
use App\Classe;
use Intervention\Image\Facades\Image;
use Validator;

class CourseController extends Controller
{
   
    public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.courses.index' , compact('courses'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $validate = Validator::make( $request->all() , [
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'price' => 'required|max:8',
            'discount' => 'required|max:8',
            'hours' => 'required|max:3',
            'category_id' => 'required',
            'class_id' => 'required',
            'desc' => 'required',
            'active' => 'required',
            'requirements' => 'required',
        ] , [] );

        if( $validate->passes() ){



            $course = new Course;

            if( $request->image ){
                Image::make($request->image)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/courses/' . $request->image->hashName());
                $course->image = 'uploads/courses/' . $request->image->hashName();
            }

            $course->name = $request->name;
            $course->price = $request->price;
            $course->discount = $request->discount;
            $course->hours = $request->hours;
            $course->desc = $request->desc;
            $course->requirements = $request->requirements;
            $course->category_id = $request->category_id;
            $course->class_id = $request->class_id;
            $course->active = $request->active;
            $course->save();

            return response()->json($course);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

   
    public function show(Request $request)
    {
        $id = $request->id;
        $course = Course::findOrFail($id);

        return response()->json($course);
    }

    
    public function edit(Request $request)
    {
        $id = $request->id;
        $course = Course::findOrFail($id);

        return response()->json($course);
    }

   
    public function update(Request $request)
    {

        $id = $request->courseID;

        $validate = Validator::make( $request->all() , [
            'name' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'price' => 'required|max:8',
            'hours' => 'required|max:3',
            'category_id' => 'required',
            'class_id' => 'required',
            'desc' => 'required',
            'active' => 'required',
            'requirements' => 'required',
        ] , [] );

        if( $validate->passes() ){



            $course = Course::findOrFail($id);

            if( $request->image ){

                if( $course->image != 'uploads/courses/default.jpg' ){
                    unlink($course->image);
                }


                Image::make($request->image)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/courses/' . $request->image->hashName());
                $course->image = 'uploads/courses/' . $request->image->hashName();
            }

            $course->name = $request->name;
            $course->price = $request->price;
            $course->discount = $request->discount;
            $course->hours = $request->hours;
            $course->desc = $request->desc;
            $course->requirements = $request->requirements;
            $course->category_id = $request->category_id;
            $course->class_id = $request->class_id;
            $course->active = $request->active;
            $course->save();

            return response()->json($course);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

    public function destroy($id)
    {
        //
    }

    public function getAll(){
        $courses = Course::latest()->get();

        return view('admin.courses.getAll' , compact('courses'));
    }

    public function getAllCategories(Request $request)
    {
        $categories = Category::all();

        return view('admin.courses.getAllCategories' , compact('categories'));
    }

    public function getAllClasses()
    {
        $classes = Classe::all();

        return view('admin.courses.getAllClasses' , compact('classes'));
    }


    public function getSelectedCategory(Request $request)   
    {
        $id = $request->id;
        $categories = Category::all();
        $course = Course::findOrFail($id);

        return view('admin.courses.getSelectedCategory' , compact('categories','course'));
    }

    public function getSelectedClasses(Request $request)
    {
        $id = $request->id;
        $classes = Classe::all();
        $course = Course::findOrFail($id);

        return view('admin.courses.getSelectedClass' , compact('classes','course'));
    }


    public function getClassCategoryName(Request $request)
    {
        $id = $request->id;
        $course = Course::findOrFail($id);
        $categoryName = $course->category->name;

        return response()->json($categoryName);
    }


    public function getCourseClassName(Request $request)
    {
        $id = $request->id;
        $course = Course::findOrFail($id);
        $className = $course->class->name;

        return response()->json($className);
    }
}
