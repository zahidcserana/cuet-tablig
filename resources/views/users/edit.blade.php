@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User Details</div>

                    <div class="panel-body">
                        @if ( count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('user_edit') }}">
                            {{ csrf_field() }}
                            <h3 class="title">Personal Info</h3>
                            <input type="hidden" name="id" value="{{$userDetails->id}}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $userDetails->name or ''}}" required autofocus>

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
                                    <input id="email" type="email" class="form-control" name="email" value="{{$userDetails->email or '' }}" required>

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
                                    <input id="mobile1" type="text" class="form-control" name="mobile1" value="{{$userDetails->mobile1 or ''}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mobile2" class="col-md-4 control-label">Second Mobile No</label>

                                <div class="col-md-6">
                                    <input id="mobile2" type="text" class="form-control" name="mobile2" value="{{$userDetails->mobile2 or ''}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="district" class="col-md-4 control-label">District</label>

                                <div class="col-md-6">
                                    <input id="district" type="text" class="form-control" name="district" value="{{$userDetails->district or ''}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="thana" class="col-md-4 control-label">Thana</label>

                                <div class="col-md-6">
                                    <input id="thana" type="text" class="form-control" name="thana" value="{{$userDetails->thana or ''}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="village" class="col-md-4 control-label">Village</label>

                                <div class="col-md-6">
                                    <input id="village" type="text" class="form-control" name="village" value="{{$userDetails->village or ''}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="marriage_status" class="col-md-4 control-label">Marriage Status</label>

                                <div class="col-md-3">Single
                                    <input id="marriage_status" type="radio" class="radio" name="marriage_status" value="1" {{$userDetails->marriage_status=='1'?'checked':""}}>
                                </div>
                                <div class="col-md-3">Married
                                    <input id="marriage_status" type="radio" class="radio" name="marriage_status" value="2" {{$userDetails->marriage_status=='2'?'checked':""}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    @if(Auth::user()->id == $userDetails->id || Auth::user()->type == 1)
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <hr>
                        <h3 class="title">Accadecmic Info</h3>
                        <form class="form-horizontal" method="POST" action="{{ route('accademic') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{$userDetails->id}}">
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

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    @if(Auth::user()->id == $userDetails->id || Auth::user()->type == 1)
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form class="form-horizontal" method="POST" action="{{ route('mehenot') }}">
                            {{ csrf_field() }}
                            <h3 class="title">Mehenot Info</h3>
                            <input type="hidden" name="user_id" value="{{$userDetails->id}}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Maximum Safar</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="max_safar" id="max_safar">
                                        <option value="">Select One</option>
                                        @foreach($safar as $key=>$value)
                                            <option @if(isset($tabligInfo->max_safar)) {{$tabligInfo->max_safar==$key?'selected':""}}@endif value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="foreign_safar" class="col-md-4 control-label">Foreign Safar</label>

                                <div class="col-md-6">
                                    <input id="foreign_safar" type="checkbox" class="checkbox" name="foreign_safar" value="1" @if(isset($tabligInfo->foreign_safar)){{$tabligInfo->foreign_safar=='1'?'checked':""}}@endif>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="thana" class="col-md-4 control-label">How many times</label>

                                <div class="col-md-6">
                                    <input id="foreign_safar_count" type="text" class="form-control" name="foreign_safar_count" value="{{$tabligInfo->foreign_safar_count or ''}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="foreign_safar" class="col-md-4 control-label">Foreign Safar With Mastura</label>

                                <div class="col-md-6">
                                    <input id="foreign_safar_with_mastura" type="checkbox" class="checkbox" name="foreign_safar_with_mastura" value="1" @if(isset($tabligInfo->foreign_safar_with_mastura)) {{$tabligInfo->foreign_safar_with_mastura=='1'?'checked':""}}@endif>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="thana" class="col-md-4 control-label">How many times</label>

                                <div class="col-md-6">
                                    <input id="mastura_foreign_safar_count" type="text" class="form-control" name="mastura_foreign_safar_count" value="{{$tabligInfo->mastura_foreign_safar_count or ''}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    @if(Auth::user()->id == $userDetails->id || Auth::user()->type == 1)
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form class="form-horizontal" method="POST" action="{{ route('profession') }}">
                            {{ csrf_field() }}
                            <h3 class="title">Professional Info</h3>
                            <input type="hidden" name="user_id" value="{{$userDetails->id}}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Company Name</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control" name="company_name" value="{{ $professions->company_name or ''}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Designation</label>

                                <div class="col-md-6">
                                    <input id="designation" type="text" class="form-control" name="designation" value="{{$professions->designation or '' }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_date" class="col-md-4 control-label">Start Date</label>

                                <div class="col-md-6">
                                    <div class="input-group date" data-provide="datepicker">
                                        <?php
                                        $date_formatted = "";
                                        if (isset($professions->start_date)){
                                            $date = new DateTime($professions->start_date);
                                            $date_formatted = $date->format('m/d/Y');
                                        }
                                        ?>
                                        <input type="text" name="start_date" class="form-control" required  value="{{$date_formatted}}">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="country" class="col-md-4 control-label">Country</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control" name="country" value="{{$professions->country or ''}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="district" class="col-md-4 control-label">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" value="{{$professions->city or ''}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a class="btn btn-success" href="{{route('users')}}">
                                        Back
                                    </a>
                                    @if(Auth::user()->id == $userDetails->id || Auth::user()->type == 1)
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head_html')
    @parent
    <script src="{{asset('assets/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/datepicker/css/bootstrap-datepicker.min.css')}}" />

    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });
    </script>
@endsection

