<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        return view('admin.settings.index' , compact('settings'));
    }

    public function update(Request $request)
    {
        $this->validate($request , [
            'website_name' => 'required',
            'website_email' => 'required|email',
            'website_phone' => 'required|min:11',
            'website_address' => 'required',
            'website_desc' => 'required',
        ]);

        $settings = Setting::first();

        if( $request->website_logo ){

            if( $settings->website_logo != 'uploads/settings/default.png' ){
                unlink($settings->website_logo);
            }


            Image::make($request->website_logo)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/settings/' . $request->website_logo->hashName());
            $settings->website_logo = 'uploads/settings/' . $request->website_logo->hashName();
            $settings->save();
        }


        $settings->website_name = $request->website_name;
        $settings->website_desc = $request->website_desc;
        $settings->website_email = $request->website_email;
        $settings->website_address = $request->website_address;
        $settings->website_phone = $request->website_phone;
        $settings->save();

        session()->flash('success' , 'Settings Updated Successfully...');
        return redirect()->route('admin.settings');

    }


    public function stopComments(Request $request)
    {
        $settings = Setting::first();

        if( $settings->stop_comments == 0 ){
            $settings->stop_comments = 1;
            $settings->save();
            session()->flash('success' , 'Comments Are Closed !');
        }else{
            $settings->stop_comments = 0;
            $settings->save();
            session()->flash('success' , 'Comments Are Openned !');
        }

        return redirect()->back();

        
    }


    public function stopRegister(Request $request)
    {
        $settings = Setting::first();

        if( $settings->stop_register == 0 ){
            $settings->stop_register = 1;
            $settings->save();
            session()->flash('success' , 'Registration Are Closed !');
        }else{
            $settings->stop_register = 0;
            $settings->save();
            session()->flash('success' , 'Registration Are Openned !');
        }

        return redirect()->back();

        
    }



    public function stopWebsite(Request $request)
    {
        $settings = Setting::first();

        if( $settings->stop_website == 0 ){
            $settings->stop_website = 1;
            $settings->save();
            session()->flash('success' , 'Website Are Closed !');
        }else{
            $settings->stop_website = 0;
            $settings->save();
            session()->flash('success' , 'Website Are Openned !');
        }

        return redirect()->back();

        
    }


}
