@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-blue"></i>
                        <span class="caption-subject font-green bold uppercase">Update Team Text</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <form role="form" method="POST" action="{{route('team.update',$team->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('put')}}
                            <div class="form-body">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><h3>Heading</h3></label>
                                        <input type="text" class="form-control input-lg" value="{{$team->heading}}" name="heading" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><h3>Details</h3></label>
                                        <textarea name="details" class="form-control" rows="10" id="team-textarea">
                                               {{$team->details}}
                                            </textarea>
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
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Team Member</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle  btn-primary" href="{{ route('member') }}" >
                            <i class="icon-plus"></i> Add New Team Member
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Image </th>
                                <th>Name </th>
                                <th> Designation </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td id="member-admin-table"><img src="{{ asset('assets/images/profile') }}/{{$member->profile_image}}" ></td>
                                    <td> {{$member->name}} </td>
                                    <td> {{$member->designation}} </td>
                                    <td>
                                        <a class="btn btn-circle btn-icon-only btn-warning"  href="{{ action('MemberController@memberUpdate', array('member_id' => $member->id)) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-danger"  href="{{ route('member.destroy', $member)}}" data-toggle="confirmation"  data-title="Are You Sure?" data-content="Delete This Service?">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- NicEditor -->
        <script src="{{ asset('assets/admin/js/nicEdit-latest.js') }}" type="text/javascript"></script>
         <!--<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>-->
          <script type="text/javascript">
                    bkLib.onDomLoaded(function() {
                        nicEditors.editors.push(
                            new nicEditor().panelInstance(
                                document.getElementById('team-textarea')     
                            )
                        );
                    });
                    //]]>
            </script>

@endsection