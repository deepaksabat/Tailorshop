@extends('admin.layouts.master')

@section('content')
@foreach($serviceactivits as $serviceactivity)
{{$serviceactivity->id}}
@if (count($errors) > 0)
 	<div class="row">
		<div class="col-md-06" style="max-width:1024px; margin:auto">
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               		@foreach ($errors->all() as $error)
            			<li>{{ $error }}</li>
        			@endforeach
            </div>
		</div>
	</div>
@endif			
{!! Form::open(['url' => '/save-update-order', 'method' => 'post']) !!}
<input name="ser_act_create_by" type="hidden" value="{{ Auth::user()->id }}">
<input name="id" type="hidden" value="{{ $serviceactivity->id }}">
<input name="id" type="hidden" value="{{ $serviceactivity->id }}">

   <div style="max-width:1024px; margin:auto">   	
    <!-- SELECT2 EXAMPLE -->
	    <div class="box box-default">
	        <div class="box-header with-border">
	          <h3 class="box-title">Order Details</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	          </div>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	          <div class="row">
	            <div class="col-md-6">
	              	<div class="form-group">
		                	<label>Select Service</label>
		                <select class="form-control select2" style="width: 100%;" name="service_id">
		                  <option disabled="disabled">Select Service</option>
		                  @foreach($services as $service)
		                  		@if($service->id==$serviceactivity->service_id)
		                  			<option value="{{$service->id}}" selected="selected">{{$service->service_name}}</option>
		                  		@else
		                  			<option value="{{$service->id}}">{{$service->service_name}}</option>
		                  		@endif
		                  @endforeach
		                </select>
		            </div>
		              <!-- /.form-group -->
		            <div class="form-group">
		                <label>Service Asign to Employee</label>
		                <select  class="form-control" style="width: 100%;" name="service_do_by">
		                  <option disabled="disabled" >Select Employee</option>
		                  @foreach(Auth::user()->All() as $user)
		                  			@if($user->id == 1)
		                  			<option value="{{$user->id}}" disabled="disabled">{{$user->name}}</option>
		                  			@elseif($user->id == $serviceactivity->service_do_by)
		                  			<option value="{{$user->id}}" selected="selected">{{$user->name}}</option>
		                  			@else
		                  			<option value="{{$user->id}}">{{$user->name}}</option>
		                  			@endif
		                  @endforeach
		                </select>
		                </select>
		            </div>
		              <!-- /.form-group -->
		        </div>
	            <!-- /.First Box End -->
	            <div class="col-md-6">
	              	<div class="form-group">
	                		<label>Service Create Date:</label>
	                	<div class="input-group date">
	                  		<div class="input-group-addon">
	                    		<i class="fa fa-calendar"></i>
	                  		</div>
	                  			<input type="text" class="form-control pull-right dpicker" name="service_crete_date" value="{{ Carbon\Carbon::parse($serviceactivity->service_crete_date)->format('d/m/Y') }}">
	                	</div>
	                <!-- /.input group -->
	              	</div>
	              	<!-- /.form-group -->
	              	<div class="form-group">
	                	<label>Delivery Date:</label>
		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  	<input type="text" class="form-control pull-right dpicker" name="service_delivery_date"  value="{{Carbon\Carbon::parse($serviceactivity->service_delivery_date)->format('d/m/Y') }}">
		                </div>
		                <!-- /.input group -->
		            </div>
		        </div>
	              <!-- /.form-group -->
	            </div>
	            <!-- /.col -->
	        </div>
	          <!-- /.row -->
	    </div>
  <!-- /.First box-body -->
        
    </div>
      	<!-- /.End Tag -->
    <div style="max-width:1024px; margin:auto">   	
    <!-- SELECT2 EXAMPLE -->
	    <div class="box box-danger">
	        <div class="box-header with-border">
	          <h3 class="box-title">Customer Details</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	          </div>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	          <div class="row">
	            <div class="col-md-6">
		            <!-- text input -->
	                <div class="form-group">
	                  <label>Customer Name:</label>
	                  <input type="text" class="form-control" placeholder="Enter ..." name="service_cus_name" value="{{$serviceactivity->service_cus_name}}">
	                </div>

	                <div class="form-group">
	                  <label>Email Address:</label>
	                  <input type="email" class="form-control" placeholder="Enter ..." name="service_cus_email" value="{{$serviceactivity->service_cus_email}}">
	                </div>
		              <!-- /.form-group -->
		        </div>
	            <!-- /.First Box End -->
	            <div class="col-md-6">
					<div class="form-group">
		                <label>Cutomer Address:</label>
		                <textarea class="form-control" rows="3" placeholder="Enter ..." style="height: 109px" name="service_cus_address">{{$serviceactivity->service_cus_address}}</textarea>
                	</div>
	              	<!-- /.form-group -->
		        </div>
	              <!-- /.form-group -->
	            </div>
	            <!-- /.col -->
	        </div>
	          <!-- /.row -->
	    </div>
  <!-- /.2nd box-body -->
        
    </div>
    <!-- /.2nd Body ody -->
 <div style="max-width:1024px; margin:auto">   	
    <!-- SELECT2 EXAMPLE -->
	    <div class="box box-default">
	        <div class="box-header with-border">
	          <h3 class="box-title">Body Measurements(cm)</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	          </div>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	          <div class="row">
	            <div class="col-md-3">
	              	<div class="form-group">
		                <label>Neck</label>
		                <input type="text" class="form-control" placeholder="Enter ..." name="mears_neck" value="{{$serviceactivity->mears_neck}}">
		            </div>
		              <!-- /.form-group -->
		            <div class="form-group">
		                <label>Sleeves</label>
		                 <input type="text" class="form-control" placeholder="Enter ..." name="mears_skeeves" value="{{$serviceactivity->mears_skeeves}}">
		            </div>
		              <!-- /.form-group -->
		        </div>
	            <!-- /.First Box End -->
	            <div class="col-md-3">
	              	<div class="form-group">
	                	<label>Shoulders:</label>
	                	 <input type="text" class="form-control" placeholder="Enter ..." name="mears_shoulders" value="{{$serviceactivity->mears_shoulders}}">
	                <!-- /.input group -->
	              	</div>
	              	<!-- /.form-group -->
	              	<div class="form-group">
	                	<label>Chest:</label>
	                	 <input type="text" class="form-control" placeholder="Enter ..." name="mears_chest" value="{{$serviceactivity->mears_chest}}">
		            </div>
		        </div>
	              <!-- /.form-group -->
	            <div class="col-md-3">
		            <div class="form-group">
		               	<label>Waist:</label>
		               	<input type="text" class="form-control" placeholder="Enter ..." name="mears_waist" value="{{$serviceactivity->mears_waist}}">
		                
		            </div>
		              	<!-- /.form-group -->
		              	<div class="form-group">
		                	<label>Hips:</label>
			                 <input type="text" class="form-control" placeholder="Enter ..." name="mears_hips" value="{{$serviceactivity->mears_hips}}">
			            </div>
		        	</div>

		        <div class="col-md-3">
	              	<div class="form-group">
	                	<label>Inseam:</label>
	                	<input type="text" class="form-control" placeholder="Enter ..." name="mears_inseam" value="{{$serviceactivity->mears_inseam}}">
	                <!-- /.input group -->
	              	</div>
	              	<!-- /.form-group -->
	              	<div class="form-group">
	                	<label>Thight:</label>
		                <input type="text" class="form-control" placeholder="Enter ..." name="mears_thigh" value="{{$serviceactivity->mears_thigh}}">
		            </div>
		        </div>
		        <div class="col-md-12">
	              	<div class="form-group">
	                	<label>Oterhs measurements(if any):</label>
	                	<input type="text" class="form-control" placeholder="Enter ..." name="mears_others" value="{{$serviceactivity->mears_others}}">
	                <!-- /.input group -->
	              	</div>
	              	<!-- /.form-group -->
		        </div>
	         </div>
	            <!-- /.col -->
	        </div>
	          <!-- /.row -->
	    </div>
  <!-- /.First box-body -->
        
    </div>
    <div class="box-footer" style="text-align:center">
          <button type="submit" class="btn bg-purple btn-flat margin"> Update/Modify Service Details</button>
    </div>
{!! Form::close() !!}
@endforeach
@endsection