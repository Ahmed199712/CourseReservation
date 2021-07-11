<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\User;
use Validator;

class InstructorController extends Controller
{
    
    public function index()
    {
        $instructors = User::where('type' , 1)->latest()->get();

        return view('admin.instructors.index' , compact('instructors'));
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $validate = Validator::make( $request->all() , [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required|min:11|unique:users',
            'age' => 'required|min:2|max:2',
            'address' => 'required',
            'gender' => 'required'
        ] , [] );

        if( $validate->passes() ){



            $instructor = new User;

            if( $request->avatar ){
                Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/instructors/' . $request->avatar->hashName());
                $instructor->avatar = 'uploads/instructors/' . $request->avatar->hashName();
            }

            $instructor->name = $request->name;
            $instructor->email = $request->email;
            $instructor->phone = $request->phone;
            $instructor->password = bcrypt($request->password);
            $instructor->age = $request->age;
            $instructor->address = $request->address;
            $instructor->gender = $request->gender;
            $instructor->type = 1;
            $instructor->save();

            return response()->json($instructor);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

   
    public function show(Request $request)
    {
        $id = $request->id;
        $instructor = User::where('type' , 1)->findOrFail($id);

        return response()->json($instructor);
    }

   
    public function edit(Request $request)
    {
        $id = $request->id;
        $instructor = User::where('type',1)->findOrFail($id);

        return response()->json($instructor);
    }

   
    public function update(Request $request)
    {
        $id = $request->instructorID;

        $validate = Validator::make( $request->all() , [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
            'phone' => 'required|min:11|unique:users,phone,'.$id,
            'age' => 'required|min:2|max:2',
            'address' => 'required',
            'gender' => 'required'
        ] , [] );

        if( $validate->passes() ){



            $instructor = User::find($id);

            if( $request->avatar ){

                if( $instructor->avatar != 'uploads/students/default.png' ){
                    unlink($instructor->avatar);
                }

                Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/students/' . $request->avatar->hashName());
                $instructor->avatar = 'uploads/students/' . $request->avatar->hashName();
            }

            $instructor->name = $request->name;
            $instructor->email = $request->email;
            $instructor->phone = $request->phone;
            if( !empty($request->password) ){
                $instructor->password = bcrypt($request->password);
            }
            $instructor->age = $request->age;
            $instructor->address = $request->address;
            $instructor->gender = $request->gender;
            $instructor->type = 1;
            $instructor->save();

            return response()->json($instructor);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

   
    public function destroy(Request $request)
    {
        $id = $request->id;
        $instructor = User::findOrFail($id);
        $instructor->delete();

        if( $instructor->avatar != 'uploads/students/default.png' ){
            unlink($instructor->avatar);
        }

        return response()->json($instructor);
    }


    public function getAll(Request $request)
    {
        $instructors = User::where('type' , 1)->latest()->get();

        return view('admin.instructors.getAll' , compact('instructors'));
    }



    public function getSelectedGender(Request $request)
    {
        $id = $request->id;
        $instructor = User::where('type' , 1)->find($id);

        return view('admin.instructors.getSelectedGender' , compact('instructor','id'));
    }
}
