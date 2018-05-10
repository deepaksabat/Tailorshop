@extends('admin.layouts.master')

@section('content')
 <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Add New Staff</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle  btn-success" href="{{route('all-user')}}">
                           <i class="fa fa-users"></i>  All Staff List
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="content">
        <!-- BEGIN REGISTRATION FORM -->
            <form class="register-form" action="{{ url('register') }}" method="POST">
                  {{ csrf_field() }}
                <p> Enter your personal details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="name" value="{{old('name')}}" /> </div>
                </div>
                 @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                 @endif

                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" value="{{old('email')}}" /> </div>
                </div>
                 @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                 @endif
                <p> Enter your account details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="{{old('username')}}" /> </div>
                </div>

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                 @endif

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" /> </div>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                 @endif
                
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                    <div class="controls">
                        <div class="input-icon">
                            <i class="fa fa-check"></i>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="password_confirmation" /> </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button id="register-back-btn" type="button" class="btn yellow-mint btn-outline sbold uppercase"> Back </button>
                    <button type="submit" id="register-submit-btn" class="btn green pull-right"> Add Staff </button>
                </div>
            </form>
            <!-- END REGISTRATION FORM -->
      </div>
                </div>
            </div>
        </div>
    </div>
@endsection