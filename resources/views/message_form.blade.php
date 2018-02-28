<?php
//dd($cuetians);
?>
@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form class="form-horizontal" method="POST" action="{{ route('message_add') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label"> Message To</label>

                    <div class="col-md-6">
                        <select name="mail_to" id="mail_to" class="form-control">
                            <option value="0">All</option>
                            @foreach($cuetians as $row)
                                <option value="{{$row->user_id}}">{{$row->batch.'/'.$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="body" class="col-md-4 control-label">Description</label>

                    <div class="col-md-6">
                        <textarea id="body" class="ckeditor" name="body" value="{{ old('body') }}" required></textarea>

                        @if ($errors->has('body'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Save
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
