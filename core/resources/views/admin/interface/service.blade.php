@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-blue"></i>
                        <span class="caption-subject font-green bold uppercase">Service Section</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                    <form role="form" method="POST" action="{{route('service.update',$service->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('put')}}
                            <div class="form-body">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><h3>Heading</h3></label>
                                            <input type="text" class="form-control input-lg" value="{{$service->heading}}" name="heading" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><h3>Details</h3></label>
                                           <textarea name="details" class="form-control" rows="3" id="member-area">
                                               {{$service->details}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <span class="btn green fileinput-button">
                                                    <i class="fa fa-plus"></i>
                                                    <span> Upload Service Background Image </span>
                                                    <input type="file" name="img" class="form-control input-lg">
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

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Service Items</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle  btn-primary"  data-toggle="modal" data-target="#addservice">
                           <i class="icon-plus"></i> New Service Item
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> Service Icon </th>
                                <th> Name </th>
                                <th> Details </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($icons as $icon)
                            <tr>
                                <td><h2><i class="fa fa-{{$icon->icon}}"></i></h2></td>
                                <td> {{$icon->name}} </td>
                                <td> {{$icon->service_detail}} </td>
                                <td>
                                  <a class="btn btn-circle btn-icon-only btn-warning"  data-toggle="modal" data-target="#service{{$icon->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-circle btn-icon-only btn-danger"  href="{{ route('icon.destroy', $icon)}}" data-toggle="confirmation"  data-title="Are You Sure?" data-content="Delete This Service?">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <!--Edit Modal -->
                <div id="service{{$icon->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit <i class="{{$icon->icon}}"></i> Account Info</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="{{route('icon.update', $icon->id)}}" >
                                     {{ csrf_field() }}
                                      {{method_field('put')}}
                                        <div class="form-group">
                                            <label for="facode">Service Icon Font Awesome Code</label>
                                            <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">fa fa-</span>
                                                   <input type="text" value="{{$icon->icon}}" class="form-control" id="icon" name="icon" >
                                                   </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="faurl">Service Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$icon->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="faurl">Serviced Details</label>
                                            <input type="text" class="form-control" id="service_detail" name="service_detail" value="{{$icon->service_detail}}">
                                        </div>
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-success" >Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                            @endforeach
                            <tr>
                                <td>
                                    <a class="btn btn-circle  btn-success" target="_blank" href="http://fontawesome.io/icons">
                                    <i class="fa fa-font-awesome"></i>Font Awesome Icon
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
                <div id="addservice" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add New Service</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="{{route('icon.store')}}" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="facode">Service Icon Font Awesome Code</label>
                                            <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">fa fa-</span>
                                                   <input type="text" class="form-control" id="icon" name="icon" >
                                                   </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="faurl">Service Name</label>
                                            <input type="text" class="form-control" id="name" name="name" >
                                        </div>

                                        <div class="form-group">
                                            <label for="service_detail">Service Detials</label>
                                            <input type="text" class="form-control" id="service_detail" name="service_detail" >
                                        </div>
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-success" >Save</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                document.getElementById('member-area')     
                            )
                        );
                    });
                    //]]>
            </script>
@endsection