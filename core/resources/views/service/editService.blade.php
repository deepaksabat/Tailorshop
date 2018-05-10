@extends('admin.layouts.master')

@section('content')
		    @if (count($errors) > 0)
		 	<div class="row">
				<div class="col-md-06">
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

<div class="row">
	<div class=" col-md-10 col-md-offset-1">
		<div class="portlet light bg-inverse bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-equalizer font-blue-hoki"></i>
					<span class="caption-subject font-blue-hoki bold uppercase">Update/Edit of Service</span>
					<span class="caption-helper">Sevice Details Update</span>
				</div>

			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="{{url('admin/update-save-service')}}" class="form-horizontal" method="POST">
					{{ csrf_field() }}
					<input type="hidden" value="{{$service->id}}" name="service_id" >
					<div class="form-body">
						<div class="form-group">
							<label>Service Name:</label>
							<input type="text" class="form-control" placeholder="Enter ..." name="service_name" value="{{$service->service_name}}">
						</div>

						<div class="form-group">
							<label>Service Value/Price:</label>
							<input type="text" class="form-control" placeholder="Enter ..." name="service_price" value="{{$service->service_price}}">
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-4">
								<button type="submit" class="btn green" name="singleOrderAction"> Add New Service</button>
							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>

@endsection