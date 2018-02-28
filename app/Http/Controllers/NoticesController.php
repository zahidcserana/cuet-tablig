<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Mail\MessageMail;
use Mail;

class NoticesController extends Controller
{
    // List
    public function index(){
        $notices = DB::table('notices')->get();
        $data['notices'] = $notices;
        return view('notices',$data);
    }

    // Update
    public function notice($id){
        $notice = DB::table('notices')->where('id',$id)->first();
        $data['notice'] = $notice;
        return view('notice',$data);
    }
    public function update(Request $request,$id){
        $data = $request->except('_token','id');
        $data['description'] = strip_tags($request->input('description'));
        // *** Mailing Start ***
        $users = DB::table('users')->Join('students','users.id','=','students.user_id')->get();
        foreach ($users as $row){
            $param = array(
                'title' => $request->input('title'),
                'name' => $row->name,
                'body' => strip_tags($request->input('description')),
                'subject' => 'Notice'
            );
            Mail::to(trim($row->email))->send(new MessageMail($param));
        }
        // *** Mailing End ***

        DB::table('notices')->where('id',$id)->update($data);
        Session::flash('success', 'Successfully Updated.');
        return redirect()->route('notices');
    }

    // New
    public function form(){
        return view('notice_form');
    }
    public function add(Request $request){
        $data = $request->except('_token');
        $data['description'] = strip_tags($request->input('description'));

        // *** Mailing Start ***
        $users = DB::table('users')->Join('students','users.id','=','students.user_id')->get();
        foreach ($users as $row){
            $param = array(
                'title' => $request->input('title'),
                'name' => $row->name,
                'body' => strip_tags($request->input('description')),
                'subject' => 'Notice'
            );
            Mail::to(trim($row->email))->send(new MessageMail($param));
        }
        // *** Mailing End ***

        DB::table('notices')->insert($data);
        Session::flash('success', 'Successfully Added.');
        return redirect()->route('notices');
    }

}
