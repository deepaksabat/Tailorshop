@extends('admin.layouts.master')

@section('content')
			@if(Session::has('success'))
				<!-- <div class="alert alert-success" role= "alert">
		        <!--<strong>Successful:</strong>
		           <!-- {!! session('success') !!} -->
				<!-- </div>-->
			@endif

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
			<div class=" col-md-8 col-md-offset-2">
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-equalizer font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Service Add</span>
							<span class="caption-helper">Tailor Shop Service Details</span>
						</div>

					</div>
					<div class="portlet-body form">
						<!-- BEGIN FORM-->
						<form action="{{url('admin/add-save-service')}}" class="form-horizontal" method="POST">
							{{ csrf_field() }}
							<div class="form-body">
								<div class="form-group">
									<label>Service Name:</label>
									<input type="text" class="form-control" placeholder="Enter ..." name="service_name">
								</div>

								<div class="form-group">
									<label>Service Value/Price:</label>
									<input type="text" class="form-control" placeholder="Enter ..." name="service_price">
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-4 col-md-offset-4 ">
										<button type="submit" class="btn green btn-block" name="singleOrderAction"> Add New Service</button>
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