
@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class=" col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">All Service List</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-condensed flip-content" id="data-table-button">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Service Name</th>
                            <th>Service Price</th>
                            <th colspan="">Action</th>
                            <th colspan="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{$service->id}}</td>
                                <td>{{$service->service_name}}</td>
                                <td>{{$service->service_price}}</td>
                                <td>
                                    @if($service->active_status==0)
                                        <button type="button" class="btn green btn-outline btn-block activebutton">
                                            <a href="{{ action('ServiceController@activationService', array('service_id' => $service->id)) }}">Click for Deactive</a>
                                        </button>
                                    @elseif($service->active_status==1)
                                        <button type="button" class="btn red btn-block activebutton">
                                            <a href="{{ action('ServiceController@activationService', array('service_id' => $service->id)) }}">Click for Active</a>
                                        </button>
                                    @endif
                                </td>
                                <td><button type="button" class="btn yellow-mint btn-outline btn-block"><a href="{{ action('ServiceController@updateService', array('service_id' => $service->id)) }}">Update Info</a> </button>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
     $(document).ready(function(){
    $('#data-table-button').dataTable();
  })
</script>
   
@endsection