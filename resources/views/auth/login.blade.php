@extends('auth.master')

@section('login')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Cuet Tablig Community</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="login_div form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="login_div form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
           {{--<div class="login_captcha g-recaptcha" data-sitekey="6LeigT4UAAAAAJZssbeekJ76g49MKYhWarpOiktu"></div>--}}
            {{--<div class="login_captcha g-recaptcha" data-sitekey="6LdJn0AUAAAAAC2yupn0QnFTUKVRsRNoJ-OfIruF"></div>--}}
            <div class="remember row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <a href="#">I forgot my password</a>
                        {{--<label>
                            <input type="checkbox"> Remember Me
                        </label>--}}
                    </div>
                </div>
                <!-- /.col -->
                <div class="signin col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
            <a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a>
        </div>
        <!-- /.social-auth-links -->

        {{--<a href="#">I forgot my password</a><br>
        <a href="{{route('register')}}" class="text-center">Register a new membership</a>--}}

    </div>
    <a class="btn btn-block btn-register btn-info btn-lg" href="{{route('register')}}" class="text-center">Register a new membership</a>
    <!-- /.login-box-body -->
@endsection

