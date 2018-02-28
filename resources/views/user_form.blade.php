@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <form class="form-horizontal" method="POST" action="{{ route('user_register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Batch</label>

                    <div class="col-md-6">
                        <select name="batch" id="batch" class="form-control">
                            <option value="">Select One</option>
                            @for($i=1970; $i<=date('Y'); $i++)
                                <option @if(isset($accademicInfo->batch))                   {{$accademicInfo->batch==$i?'selected':""}}@endif value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Department</label>

                    <div class="col-md-6">
                        <select name="department" id="department" class="form-control">
                            <option value="">Select One</option>
                            @foreach($department as $key=>$value)
                                <option @if(isset($accademicInfo->department)) {{$accademicInfo->department==$key?'selected':""}}@endif value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Hall</label>

                    <div class="col-md-6">
                        <select name="hall" id="hall" class="form-control">
                            <option value="">Select One</option>
                            @foreach($hall as $key=>$value)
                                <option @if(isset($accademicInfo->hall)) {{$accademicInfo->hall==$key?'selected':""}}@endif value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobile1" class="col-md-4 control-label">First Mobile No</label>

                    <div class="col-md-6">
                        <input id="mobile1" type="text" class="form-control" name="mobile1" required>
                    </div>
                </div>

               {{-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>--}}

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
