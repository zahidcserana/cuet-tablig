<div class="active tab-pane" id="personal">
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
                <a class="btn btn-success" href="{{route('home')}}">
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