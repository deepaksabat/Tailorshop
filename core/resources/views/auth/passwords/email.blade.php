@extends('admin.layouts.loginmaster')

@section('content')
    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="{{URL('home')}}">
                <img src="{{URL::asset('assets/image/tailorlogo.jpg')}}" height="100" width="300"> </a>
        </div>
        <!-- END LOGO -->
  <div class="content">
        <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}
                <h3>Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}" /> </div>
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                 @endif
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn grey-salsa btn-outline"> Back </button>
                    <button type="submit" class="btn green pull-right"> Submit </button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->

        <!-- BEGIN LOGIN -->
      


        </div>
@endsection