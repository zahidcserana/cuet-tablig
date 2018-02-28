<div class="tab-pane" id="timeline">
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