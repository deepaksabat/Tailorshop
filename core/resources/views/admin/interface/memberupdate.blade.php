@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <form role="form" method="POST" action="{{route('member-update-save')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="panel-heading">Member Update</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="hidden" class="form-control" id="member_id" name="member_id" value="{{$member->id}}">
                            <input type="text" class="form-control" id="name" name="name" value="{{$member->name}}">
                        </div>

                        <div class="form-group">
                            <label for="faurl">Deisgnation:</label>
                            <input type="text" class="form-control" id="designation" name="designation" value="{{$member->designation}}" >
                        </div>

                        <div class="form-group">
                                   <span class="btn green fileinput-button">
                                       <i class="fa fa-plus"></i>
                                          <span> Profile Picture </span>
                                          <input type="file" name="profile_image" class="form-control input-lg">
                                   </span>
                        </div>

                        <div class="panel-footer">
                            <button type="submit" class="btn blue-hoki btn-block" data-dismiss="modal">Update Member Info</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection