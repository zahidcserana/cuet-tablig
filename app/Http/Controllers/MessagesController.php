<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Mail;
use App\Mail\MessageMail;

class MessagesController extends Controller
{
    public function index(){
        $messages = DB::table('messages')->where('user_id',Auth::user()->id)->where('status',1)->get();
        $data['messages'] = $messages;
        return view('user_message',$data);
    }
    public function messages(){
        $messages = DB::table('messages')->where('status',1)->get();
        $data['messages'] = $messages;
        return view('messages',$data);
    }

    // Update
    public function message($id){
        $message = DB::table('messages')->where('id',$id)->where('user_id',Auth::user()->id)->first();
        if (empty($message)){
            Session::flash('message', 'Not permitted!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('messages');
        }
        $cuetinas = DB::table('users')->Join('students','users.id','=','students.user_id')->orderBy('batch', 'desc')->get();
        $data['cuetians'] = $cuetinas;
        $data['message'] = $message;
        return view('message',$data);
    }
    public function update(Request $request,$id){
        $data = $request->except('_token','id');
        $data['body'] = strip_tags($request->input('body'));
        // *** Mailing Start ***
        if ($request->input('mail_to')==0){
            $users = DB::table('users')->Join('students','users.id','=','students.user_id')->get();
            foreach ($users as $row){
                $param = array(
                    'title' => $request->input('title'),
                    'name' => $row->name,
                    'body' => strip_tags($request->input('body')),
                    'subject' => 'Message'
                );
                Mail::to(trim($row->email))->send(new MessageMail($param));
            }
        }else {
            $userDetails = DB::table('users')->where('id',$request->input('mail_to'))->first();
            $param = array(
                'title' => $request->input('title'),
                'name' => $userDetails->name,
                'body' => strip_tags($request->input('body')),
                'subject' => 'Message'
            );
            Mail::to(trim($userDetails->email))->send(new MessageMail($param));
        }
        // *** Mailing End ***

        DB::table('messages')->where('id',$id)->update($data);
        Session::flash('message', 'Successfully Updated.');
        return redirect()->route('messages');
    }

    // New
    public function form(){
        $cuetinas = DB::table('users')->Join('students','users.id','=','students.user_id')->orderBy('batch', 'desc')->get();
        $data['cuetians'] = $cuetinas;
        return view('message_form',$data);
    }
    public function add(Request $request){
        $data = $request->except('_token');
        $data['body'] = strip_tags($request->input('body'));
        $data['user_id'] = Auth::user()->id;

        // *** Mailing Start ***
        if ($request->input('mail_to')==0){
            $users = DB::table('users')->Join('students','users.id','=','students.user_id')->get();
            foreach ($users as $row){
                $param = array(
                    'title' => $request->input('title'),
                    'name' => $row->name,
                    'body' => strip_tags($request->input('body')),
                    'subject' => 'Message'
                );
                Mail::to(trim($row->email))->send(new MessageMail($param));
            }
        }else {
            $userDetails = DB::table('users')->where('id',$request->input('mail_to'))->first();
            $param = array(
                'title' => $request->input('title'),
                'name' => $userDetails->name,
                'body' => strip_tags($request->input('body')),
                'subject' => 'Message'
            );
            Mail::to(trim($userDetails->email))->send(new MessageMail($param));
        }
        // *** Mailing End ***

        DB::table('messages')->insert($data);
        Session::flash('success', 'Successfully Added.');
        return redirect()->route('messages');
    }

}
