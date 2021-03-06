@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-blue"></i>
                        <span class="caption-subject font-green bold uppercase">Logo and Icon Settings</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Present Logo</div>
                              <div class="panel-body">
                                  <img src="{{ asset('assets/images/logo') }}/{{$logo->logo}}" class="img-responsive" width="100" height="100">
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-success">
                              <div class="panel-heading">Present Icon</div>
                              <div class="panel-body">
                                  <img src="{{ asset('assets/images/logo') }}/{{$logo->icon}}" class="img-responsive" width="100" height="100">
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form role="form" method="POST" action="{{action('LogoController@updateLogo')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="btn green fileinput-button">
                                                <i class="fa fa-plus"></i>
                                            <span> Upload New Logo </span>
                                            <input type="file" name="logo" class="form-control input-lg"> </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="btn green fileinput-button">
                                                <i class="fa fa-plus"></i>
                                                <span> Upload New Icon </span>
                                                <input type="file" name="icon" class="form-control input-lg"> 
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn blue btn-lg">Update</button>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection