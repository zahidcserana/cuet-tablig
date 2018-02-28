@extends('layouts.default')

@section('site')
    <div class="login-box-body">
        <h3 style="color: #93a1a1;"><b>Cuet Tablig Community</b></h3>
        <div style="background-color: #3c3c3c;height: 200px;width: 600px">
            <h2 style="color: #00cc66;padding: 5%;">
                Your Account Successfully Activated. Now you can login using the link below.
            </h2>
        </div>
        <br>
        <a href="{{route('login')}}" class="text-center"><h4><i>Login Here</i></h4></a>
    </div>
@endsection