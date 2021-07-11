<?php

namespace App\Http\Controllers\AdminControllersFolder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use Validator;
use App\Course;
use App\Classe;
use App\Comment;
use App\User;
use App\Message;
use App\Category;
use App\Admin;
use App\Floor;
use App\Reservation;
use DB;
use Carbon\Carbon;
use Mail;

class AdminAuthController extends Controller
{
    public function index()
    {   
        $courses = Course::all();
        $classes = Classe::all();
        $comments = Comment::all();
        $students = User::where('type',0)->get();
        $instructors = User::where('type',1)->get();
        $categories = Category::all();
        $admins = Admin::all();
        $floors = Floor::all();
        $reservations = Reservation::all();
        $message_count = Message::count();

        return view('admin.index' , compact('categories','message_count','instructors','floors','reservations','admins','courses' , 'classes','comments','students'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
       
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required'
        ]);
            
        if( auth()->guard('admin')->attempt(['email' => request('email') , 'password' => request('password')]) )
        {   
            session()->flash('successLogin' , 'Welcome ▲ [ '.auth()->guard('admin')->user()->name.' ]' );
            
            return redirect('/admin');
        }else{
            session()->flash('errorLogin' , 'Email or password incorrect !');
            return redirect('/admin/login');
        }
       
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        session()->flash('successLogout' , 'Successfully LoggedOut ...');

        return redirect('admin/login');
    }

    public function forgot_password()
    {
        return view('admin.forgot_password');
    }

    public function forgot_password_post(Request $request)
    {
       
        
        $admin = Admin::where('email' , request('email'))->first();



        if( !empty($admin) ){
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            session()->flash('success' , 'Reset Link Sent Successfully Check Your Email ...');
            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }


    public function reset_password($token)
    {
        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        
        if( !empty($check_token) )
        {
            return view('admin.reset_password' , ['data'=>$check_token ]);
        }else{
            return redirect(aurl('forgot/password'));
        }
    }


    public function reset_password_final($token)
    {
        $this->validate(request(),[
            'password' => 'required|confirmed'
        ]); 

        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        
        if( !empty($check_token) )
        {
            
            $admin = Admin::where('email' , $check_token->email)->update([
                'email' => $check_token->email,
                'password' => bcrypt(request('password'))
            ]);

            DB::table('password_resets')->where('email',request('email'))->delete();
            auth()->guard('admin')->attempt(['email'=> $check_token->email , 'password' => request('password')] , true);
            return redirect(aurl());


        }else{
            return redirect(aurl('forgot/password'));
        }
    }
}
