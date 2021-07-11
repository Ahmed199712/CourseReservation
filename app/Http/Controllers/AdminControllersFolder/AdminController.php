<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Admin;
use Validator;


class AdminController extends Controller
{
    
    public function index()
    {
        $admins = Admin::where('role',1)->latest()->get();
        return view('admin.admins.index' , compact('admins'));
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $validate = Validator::make( $request->all() , [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|min:11|unique:admins'
        ] , [] );

        if( $validate->passes() ){



            $admin = new Admin;

            if( $request->avatar ){
                Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/avatars/admin/' . $request->avatar->hashName());
                $admin->avatar = 'uploads/avatars/admin/' . $request->avatar->hashName();
            }

            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->role = 1;
            $admin->password = bcrypt($request->password);
            $admin->save();

            return response()->json($admin);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
        
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit(Request $request)
    {
        $id = $request->id;

        $admin = Admin::findOrFail($id);

        return response()->json($admin);

    }

    public function update(Request $request)
    {
        $id = $request->adminID;


        $validate = Validator::make( $request->all() , [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
            'password' => 'nullable|min:6|confirmed',
            'phone' => 'required|min:11|unique:admins,phone,'.$id
        ] , [] );


        if( $validate->passes() ){

            $admin = Admin::findOrFail($id);

            if( $request->avatar ){

                if( $admin->avatar != 'uploads/avatars/admin/default.png' ){
                    unlink($admin->avatar);
                }
                
                Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('uploads/avatars/admin/' . $request->avatar->hashName());
                $admin->avatar = 'uploads/avatars/admin/' . $request->avatar->hashName();
            }

            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            if( !empty($request->password) ){
                $admin->password = bcrypt($request->password);
            }
            $admin->save();

            return response()->json($admin);



        }else{
            return response()->json(['errors' => $validate->errors()->all()]);
        }
    }

   
    public function destroy(Request $request)
    {
        $id = $request->id;
        $admin = Admin::findOrFail($id);
        $admin->delete();

        if( $admin->avatar != 'uploads/avatars/admin/default.png' ){
            unlink($admin->avatar);
        }

        return response()->json($admin);
    }


    public function getAll(){
        $admins = Admin::where('role',1)->latest()->get();

        return view('admin.admins.getAll' , compact('admins'));
    }

    public function profile()
    {
        $admin = auth()->guard('admin')->user();

        return view('admin.admins.profile' , compact('admin'));
    }

    public function profileUpdate(Request $request)
    {
        $id = auth()->guard('admin')->user()->id;

        $this->validate($request , [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'. $id,
            'phone' => 'required',
            'password' => 'confirmed'
        ]);

        $admin = Admin::findOrFail($id);
            
        if( $request->avatar ){

            if( $admin->avatar != 'uploads/avatars/admin/default.png' ){
                unlink($admin->avatar);
            }
            
            Image::make($request->avatar)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/avatars/admin/' . $request->avatar->hashName());
            $admin->avatar = 'uploads/avatars/admin/' . $request->avatar->hashName();
        }


        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if( !empty($request->password) ){
            $admin->password = bcrypt($request->password);
        }
        $admin->name = $request->name;
        $admin->save();

        session()->flash('success' , 'Profile Updated Successfully ...');
        return redirect()->back();

    }
    
}
