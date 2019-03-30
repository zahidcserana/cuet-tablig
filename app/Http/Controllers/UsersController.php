<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Session;
use Validator;
use Auth;
use Input;
``
use Mail;
use Keygen;
use App\Mail\testMail;
use Image;

class UsersController extends Controller
{
    public function downloadPDF(Request $request){
        $users = $request->session()->get('param');
        $pdf = PDF::loadView('pdf', compact('users'));
        return $pdf->download('cuetian.pdf');
    }

    public function AllUser(Request $request){
        $name = '';
        $email = '';
        if ($request->input('submit') == 'search'){
            $conditions = array();
            if (!empty($request->input('email'))) {
                $email = $request->input('email');
                $conditions = array_merge(array(['users.email', 'LIKE', '%' . $email . '%']), $conditions);
            }
            if (!empty($request->input('name'))) {
                $name = $request->input('name');
                $conditions = array_merge(array(['users.name', 'LIKE', '%' . $name . '%']), $conditions);
            }
            $users = DB::table('users')->where($conditions)->get();
        }else{
            $users = DB::table('users')->get();
        }
        $data['users']      = $users;
        $data['name']       = $name;
        $data['email']      = $email;

        return view('all_user',$data);
    }

    public function users(Request $request){
        $batch = '';
        $department = '';
        $name = '';
        $email = '';
        if ($request->input('submit') == 'search'){
            $conditions = array();
            $join=false;
            if (!empty($request->input('email'))) {
                $email = $request->input('email');
                $conditions = array_merge(array(['users.email', 'LIKE', '%' . $email . '%']), $conditions);
            }
            if (!empty($request->input('name'))) {
                $name = $request->input('name');
                $conditions = array_merge(array(['users.name', 'LIKE', '%' . $name . '%']), $conditions);
            }
            if (!empty($request->input('department'))) {
                $join=true;
                $department = $request->input('department');
                $conditions = array_merge(array('students.department' => $department), $conditions);
            }
            if (!empty($request->input('batch'))) {
                $join=true;
                $batch = $request->input('batch');
                $conditions = array_merge(array('students.batch' => $batch), $conditions);
            }
            if ($join==true){

                $users = DB::table('students')->Join('users','users.id','=','students.user_id')->where($conditions)->get();
            }
            else{
                $users = DB::table('users')->where($conditions)->get();
            }

        }else{
            $users = DB::table('students')->Join('users','users.id','=','students.user_id')->get();
        }
        //dd($users);
        $request->session()->put('param', $users);
        $data['users']      = $users;
        $data['batch']      = $batch;
        $data['department'] = $department;
        $data['name']       = $name;
        $data['email']      = $email;
        $data['t']      = 1;


        return view('users',$data);
    }

    public function userForm(){
        $data['department'] = \Config::get('cuet.department');
        $data['hall'] = \Config::get('cuet.hall');

        return view('user_form',$data);
    }

    public function UserRegister(Request $request){
        $password = Keygen::numeric(6)->generate();
        $code = Keygen::numeric(10)->generate();
        $data = $request->except('_token');
        $rules = [
            'batch' => 'required',
            'department' => 'required',
            'hall' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users'
           // 'password' => 'required|string|min:6|confirmed'
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $input = array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($password),
                    'mobile1' => $data['mobile1'],
                    'code' => $code
                );
        $user = DB::table('users')->insertGetid($input);
        $student = array(
            'user_id' => $user,
            'hall' => $data['hall'],
            'department' => $data['department'],
            'batch' => $data['batch']
        );
        DB::table('students')->insert($student);

        // *** Mailing Start ***
        $param = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
            'subject' => 'Registration',
            'code' => $code
        );

        Mail::to($data['email'])->send(new testMail($param));
        // *** Mailing End ***

        Session::flash('success', 'Successfully Added.');
        return redirect()->route('users');
    }

    public function Profile(){
        $id = Auth::user()->id;

        $userDetails = DB::table('users')->where('id',$id)->first();
        $accademicInfo = DB::table('students')->where('user_id',$id)->first();
        $tabligInfo = DB::table('tabligs')->where('user_id',$id)->first();
        $professions = DB::table('professions')->where('user_id',$id)->first();
        $data['department'] = \Config::get('cuet.department');
        $data['safar'] = \Config::get('cuet.safar');
        $data['hall'] = \Config::get('cuet.hall');
        $data['userDetails'] = $userDetails;
        $data['accademicInfo'] = $accademicInfo;
        $data['tabligInfo'] = $tabligInfo;
        $data['professions'] = $professions;

        return view('users.profile',$data);
    }
    public function View($id){
        $userDetails = DB::table('users')->where('id',$id)->first();
        $accademicInfo = DB::table('students')->where('user_id',$id)->first();
        $tabligInfo = DB::table('tabligs')->where('user_id',$id)->first();
        $professions = DB::table('professions')->where('user_id',$id)->first();
        $data['department'] = \Config::get('cuet.department');
        $data['safar'] = \Config::get('cuet.safar');
        $data['hall'] = \Config::get('cuet.hall');
        $data['userDetails'] = $userDetails;
        $data['accademicInfo'] = $accademicInfo;
        $data['tabligInfo'] = $tabligInfo;
        $data['professions'] = $professions;

        return view('user_view',$data);
    }
    public function Edit(Request $request){
        $data = $request->except('_token','id');
        $userId = $request->input('id');

        DB::table('users')->where('id',$userId)->update($data);
        Session::flash('success', 'Successfully Updated.');

        return redirect()->route('profile');
    }

    public function Accademic(Request $request){
        $data = $request->except('_token');
        $userId = $request->input('user_id');
        $rules = [
            'batch' => 'required',
            'department' => 'required',
            'hall' => 'required'
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $check = DB::table('students')->where('user_id',$userId)->first();
        if($check){
            DB::table('students')->where('user_id',$userId)->update($data);
        }
        else{
            DB::table('students')->insert($data);
        }
        Session::flash('success', 'Successfully Updated.');
        return redirect()->route('profile');
    }

    public function Profession(Request $request){
        $data = $request->except('_token');
        $userId = $request->input('user_id');
        $startDate = $request->input('start_date');
        $startDate = explode('/',$startDate);
        $startDate = $startDate['2'].'-'.$startDate['0'].'-'.$startDate['1'];
        $data['start_date'] = $startDate;
        $rules = [
            'company_name' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'country' => 'required',
            'city' => 'required'
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $check = DB::table('professions')->where('user_id',$userId)->first();
        if($check){
            DB::table('professions')->where('user_id',$userId)->update($data);
        }
        else{
            DB::table('professions')->insert($data);
        }
        Session::flash('success', 'Successfully Updated.');
        return redirect()->route('profile');
    }

    public function Mehenot(Request $request){
        $data = $request->except('_token');
        $userId = $request->input('user_id');
        $rules = [
            'max_safar' => 'required'
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $check = DB::table('tabligs')->where('user_id',$userId)->first();
        if($check){
            DB::table('tabligs')->where('user_id',$userId)->update($data);
        }
        else{
            DB::table('tabligs')->insert($data);
        }
        Session::flash('success', 'Successfully Updated.');
        return redirect()->route('profile');
    }

    public function UserImage(Request $request)
    {
        $status = false;
        //if (Input::hasFile('file')) {
        if (isset($_FILES["file"])) {
            //$file = Input::file('file');
            $file = $request->file;

            $cropedImage = $request->cropedImageContent;
            $pos = strpos($cropedImage, ',');
            $rest = substr($cropedImage, $pos);
            $data = base64_decode($rest);

            $name = $file->getClientOriginalName();
            $temp = explode('.', $name);
            $extention = array_pop($temp);

            $fileName2 = Uuid::generate(1);
            $fileName2 = $fileName2 . "." . $extention;
            $destinationPath = public_path().'/assets/images/users';

           // $dir = $destinationPath.'/assets/images/users';
            //$dir = $_SERVER['DOCUMENT_ROOT'].'/assets/images/users'; /server

            //$newImg2 = $file->move($dir, $fileName2);
            file_put_contents($destinationPath."/".$fileName2, $data);

            //$srcFile2 = $newImg2->getRealPath();

            $input = array(
                'picture' => $fileName2,
                'updated_at' => date('Y-m-d H:i:s')
            );
            DB::table('users')->where('id', $request->user_id)->update($input);

            $status = true;
        }
        if($status){
            return json_encode(['success' => true, 'message' =>'Your profile picture successfully changed!' ]);
        }
        else{
            return json_encode(['success' => false, 'message' =>'Sorry! Your profile picture not changed!' ]);
        }
    }
}
