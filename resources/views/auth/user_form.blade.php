@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

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

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
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
                            </div>

                            <div class="form-group">
                                <label for="mobile1" class="col-md-4 control-label">First Mobile No</label>

                                <div class="col-md-6">
                                    <input id="mobile1" type="text" class="form-control" name="mobile1" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mobile2" class="col-md-4 control-label">Second Mobile No</label>

                                <div class="col-md-6">
                                    <input id="mobile2" type="text" class="form-control" name="mobile2">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="district" class="col-md-4 control-label">District</label>

                                <div class="col-md-6">
                                    <input id="district" type="text" class="form-control" name="district">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="thana" class="col-md-4 control-label">Thana</label>

                                <div class="col-md-6">
                                    <input id="thana" type="text" class="form-control" name="thana">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="village" class="col-md-4 control-label">Village</label>

                                <div class="col-md-6">
                                    <input id="village" type="text" class="form-control" name="village">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="marriage_status" class="col-md-4 control-label">Marriage Status</label>

                                <div class="col-md-3">Single
                                    <input id="marriage_status" type="radio" class="radio" name="marriage_status" value="1" checked>
                                </div>
                                <div class="col-md-3">Married
                                    <input id="marriage_status" type="radio" class="radio" name="marriage_status" value="2">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
