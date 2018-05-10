@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <form role="form" method="POST" action="{{route('member.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel-heading">
                     Add New Member
                    <div class="pull-right">
                        <a class="btn btn-xs  btn-success" href="{{route('team')}}">
                           <i class="icon-plus"></i> Team Member List
                        </a>
                    </div>
                    </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>

                            <div class="form-group">
                                <label for="faurl">Deisgnation:</label>
                                <input type="text" class="form-control" id="designation" name="designation" >
                            </div>
                            <div class="form-group">
                               <span class="btn green fileinput-button">
                                     <i class="fa fa-plus"></i>
                                     <span> Profile Picture </span>
                                     <input type="file" name="profile_image" class="form-control input-lg">
                                </span>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn purple btn-block" data-dismiss="modal">Create New Member</button>
                        </div>
                </form>
            <div>
        </div>
    </div>

@endsection