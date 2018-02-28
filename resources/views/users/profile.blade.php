@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="f_section">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-md-5 col-sm-5 col-xs-8">
                                        <img src="{{strlen($userDetails->picture)>0?'assets/images/users/'.$userDetails->picture:'assets/images/avator.png' }}" id="base_image" alt="..." style="max-width: 150px; max-height: 150px">
                                        <div class="btn-group-vertical">
                                            <a href="javascript:void(0)" id="picture_change" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                        <p class="text-muted text-center">@if(isset($accademicInfo->batch)){{$accademicInfo->batch}}@endif</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Company Name</b> <a class="pull-right">@if(isset($professions->company_name)){{$professions->company_name}}@endif</a>
                            </li>
                            <li class="list-group-item">
                                <b>Designation</b> <a class="pull-right">@if(isset($professions->designation)){{$professions->designation}}@endif</a>
                            </li>
                            <li class="list-group-item">
                                <b>City</b> <a class="pull-right">@if(isset($professions->city)){{$professions->city}}@endif</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Go</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- About Me Box -->
               {{-- <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                        <p class="text-muted">Malibu, California</p>
                        <hr>
                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>
                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>--}}
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class='alert alert-success'>
                        {{Session::get('success')}}
                    </div>
                @endif
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
                        <li><a href="#activity" data-toggle="tab">Academic</a></li>
                        <li><a href="#timeline" data-toggle="tab">Mehenot</a></li>
                        <li><a href="#settings" data-toggle="tab">Professional</a></li>
                    </ul>
                    <div class="tab-content">
                        @include('users.personal')
                        @include('users.accademic')
                        @include('users.mehenot')
                        @include('users.professional')
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    {{--Image Upload Modal--}}
    <div class="modal fade" id="modalChangePicture" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="position: absolute;">
                <div class="modal-body">
                    <div class="f_section">
                        <div align="center">
                            <h4>Upload image</h4>
                        </div>
                        <div class="col-md-12" id="upImage" style="text-align: center;">
                            <div id="image-div1">
                                <img id="image_upload" src="" style="width: 100%;" alt="..." style='display: none;'>
                            </div>
                            <img id="imageCropped" src="" style="display: none; width:100%;">
                            <br>
                            <br>
                            <a href="javascript:void(0)" id="change_picture" class="btn btn-primary" style="display: none;">Change</a>
                            <div class="btn-group-horizontal">
                                <a href="javascript:void(0)" id="back" class="btn btn-primary" style="display: none;">Back</a>
                                <a href="javascript:void(0)" id="save" class="btn btn-primary" style="display: none;">Save</a>
                                <a href="javascript:void(0)" id="discard" class="btn btn-primary" style="display: none;">Cancel</a>
                                <input type='button' id='getCroppedImage' class="btn btn-primary" value='Get Cropped Area' >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="file" id="imageFile" name="photo" style="display: none;">
                            <br>
                            <div class="progress" style="display: none;">
                                <div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('head_html')
    @parent
    <script src="assets/cropper/cropper.min.js"></script>
    <link rel="stylesheet" href="assets/cropper/cropper.css">
    <style>
        img {
            max-width: 100%;
        }
    </style>
    <script>
        $(document).ready(function(){
            var cropper;
            var div2Width;
            var imageWidth;
            $("#change_picture").click(function()
            {
                $( "#imageFile" ).click();
            });
            $("#picture_change").click(function()
            {
                $( "#imageFile" ).click();
            });
            $( "#imageFile" ).change(function()
            {
                console.log('cropper created');
                var _URL = window.URL || window.webkitURL;
                img = new Image();
                img.onerror = function() { alert('Please chose an image file!'); };
                img.onload = function () {

                    var imageWidth = this.width;
                    $("#imageCropped").hide();
                    $('#image_upload').attr('src',this.src);
                    $("#image-div1").show();
                    $("#change_picture").hide();
                    $("#back").hide();
                    $("#save").hide();
                    $("#discard").show();
                    $("#getCroppedImage").show();
                    $('#modalChangePicture').modal('show');
                };
                img.src = _URL.createObjectURL(this.files[0]);
            });

            $("#getCroppedImage").click(function(){
                var imageSrc = cropper.getCroppedCanvas().toDataURL('image/jpeg');
                $("#image-div1").hide();
                $("#imageCropped").show();
                $("#imageCropped").attr('src', imageSrc );

                $("#save").show();
                $("#discard").show();
                $("#back").show();
                $("#change_picture").hide();
                //$("#imag-canvas").hide();
                $("#getCroppedImage").hide();

            });

            $( "#save" ).click(function()
            {
                $(".progress").show();
                var user_id = $("#user_id").val();
                var img = document.getElementById('imageFile');
                var cropedImg = $('#imageCropped').attr('src');
                $('#base_image').attr('src',cropedImg);
                var CSRF_TOKEN = "{{ csrf_token() }}";
                var data = new FormData();
                data.append('file', img.files[0]);
                data.append('cropedImageContent', cropedImg);
                data.append('user_id', user_id);
                data.append('_token', CSRF_TOKEN);
                var Url = "{{route('user_image')}}";

                var xhr = new XMLHttpRequest();
                xhr.upload.addEventListener('progress',function(ev){
                    var progress = parseInt(ev.loaded / ev.total * 100);
                    $('#progressBar').css('width', progress + '%');
                    $('#progressBar').html(progress + '%');
                }, false);
                xhr.onreadystatechange = function(ev)
                {
                    console.log(xhr.readyState);
                    if(xhr.readyState == 4){
                        if(xhr.status = '200')
                        {
                            $("#imageCropped").hide();
                            $(".progress").hide();
                            $("#save").hide();
                            $("#back").hide();
                            $("#discard").hide();
                            $("#getCroppedImage").hide();
                            $('#progressBar').css('width','0' + '%');
                            $('#progressBar').html('0' + '%');
                            $('#modalChangePicture').modal('hide');

                            location.reload();
                        }

                    }
                };
                xhr.open('POST', Url , true);
                xhr.send(data);
                return false;
            });

            $( "#back" ).click(function()
            {
                $("#image-div1").show();
                $("#imageCropped").hide();
                $("#discard").show();
                $("#getCroppedImage").show();
                $("#save").hide();
                $("#back").hide();
                $("#change_picture").hide();
            });

            $( "#discard" ).click(function()
            {
                $('#modalChangePicture').modal('hide');
            });

            $("#modalChangePicture").on('hidden.bs.modal', function () {
                console.log('hide modal');
                cropper.destroy();
                $("#imageFile").val("");
            });

            $('#modalChangePicture').on('shown.bs.modal', function() {

                console.log('sho9wing');
                var div2Width = $("#upImage").width();
                console.log("width:");
                console.log(this.width);
                console.log(div2Width);
                console.log("width:");
                if (this.width<div2Width)
                {
                    document.getElementById('image-div1').style.width = this.width;
                }
                var image = document.getElementById('image_upload');

                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    crop: function(e) {
                        console.log(e.detail.x);
                        console.log(e.detail.y);
                        console.log(e.detail.width);
                        console.log(e.detail.height);
                        console.log(e.detail.rotate);
                        console.log(e.detail.scaleX);
                        console.log(e.detail.scaleY);
                    }
                });
            });
        });
    </script>
@stop