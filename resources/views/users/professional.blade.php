<div class="tab-pane" id="settings">
    <form class="form-horizontal" method="POST" action="{{ route('profession') }}">
        {{ csrf_field() }}
        <h3 class="title">Professional Info</h3>
        <input type="hidden" id="user_id" name="user_id" value="{{$userDetails->id}}">
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