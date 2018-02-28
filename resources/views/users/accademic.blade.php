<div class="tab-pane" id="activity">
    <h3 class="title">Academic Info</h3>
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