<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user());
        $notice = DB::table('notices')->get();
        $user = DB::table('users')->get();
        $students = DB::table('students')->get();
        $visitor = DB::table('visitors')->get();

        $data['notice'] = $notice;
        $data['user'] = $user;
        $data['students'] = $students;
        $data['visitor'] = $visitor;

        return view('home',$data);
    }

    public function welcome(){
        return view('auth.welcome');
    }

    public function activation($email,$code){
        if ($code && $email){
            $check = DB::table('users')->where('email',$email)->where('code',$code)->first();
            if($check){
                $user = DB::table('users')->where('id',$check->id)->update(['status'=>1]);
                //Auth::login($user, true);
            }
            return redirect()->route('login');
        }
    }
}
