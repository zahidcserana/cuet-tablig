@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form class="form-horizontal" method="POST" action="{{ route('notice',$notice->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$notice->id}}">

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control" name="title" value="{{ $notice->title or ''}}" required autofocus>

                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">Description</label>

                    <div class="col-md-6">
                        <textarea id="description" class="ckeditor" name="description" required>{{ $notice->description or ''}}</textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-md-4 control-label"> Status</label>
                    <div class="col-md-6">
                        <select name="status" id="status" class="form-control">
                            <option {{$notice->status==1?'selected':""}} value="1">Active</option>
                            <option {{$notice->status==0?'selected':""}} value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('head_html')
    @parent

    <script src="{{asset('assets/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>

@endsection
