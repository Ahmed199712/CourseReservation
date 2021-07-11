<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\User;
use Validator;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = User::where('type' , 0)->latest()->get();
        return view('admin.students.index' , compact('students'));
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



            $student = new User;

            if( $request->avatar ){
                Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/students/' . $request->avatar->hashName());
                $student->avatar = 'uploads/students/' . $request->avatar->hashName();
            }

            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->password = bcrypt($request->password);
            $student->age = $request->age;
            $student->address = $request->address;
            $student->gender = $request->gender;
            $student->type = 0;
            $student->save();

            return response()->json($student);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

 
    public function show(Request $request)
    {
        $id = $request->id;
        $student = User::findOrFail($id);

        return response()->json($student);
    }

   
    public function edit(Request $request)
    {
        $id = $request->id;
        $student = User::findOrFail($id);

        return response()->json($student);
    }

  
    public function update(Request $request)
    {

        $id = $request->studentID;

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



            $student = User::find($id);

            if( $request->avatar ){

                if( $student->avatar != 'uploads/students/default.png' ){
                    unlink($student->avatar);
                }

                Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/students/' . $request->avatar->hashName());
                $student->avatar = 'uploads/students/' . $request->avatar->hashName();
            }

            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            if( !empty($request->password) ){
                $student->password = bcrypt($request->password);
            }
            $student->age = $request->age;
            $student->address = $request->address;
            $student->gender = $request->gender;
            $student->type = 0;
            $student->save();

            return response()->json($student);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

    
    public function destroy(Request $request)
    {
        $id = $request->id;
        $student = User::findOrFail($id);
        $student->delete();

        if( $student->avatar != 'uploads/students/default.png' ){
            unlink($student->avatar);
        }

        return response()->json($student);
    }

    public function getAll(){
        $students = User::where('type',0)->latest()->get();

        return view('admin.students.getAll' , compact('students'));
    }

    public function getSelectedGender(Request $request)
    {
        $id = $request->id;
        $student = User::find($id);

        return view('admin.students.getSelectedGender' , compact('student','id'));
        
    }


}
