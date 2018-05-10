@extends('admin.layouts.master')

@section('content')
	<!-- SELECT2 EXAMPLE -->
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
{!! Form::open(['url' => 'admin/save-update-shop-info','files'=>true, 'method' => 'post']) !!}
	   {{ csrf_field() }}
	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3>Invoice and Shop Profile Information Update:</h3>
			</div>
			<div class="panel-body">
				<input name="service_create_by" type="hidden" value="{{ Auth::user()->id }}">
				<!-- /.First Box End -->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="bold  uppercase">Shop Name:</label>
							<input type="text" class="form-control" placeholder="Enter ..." name="shop_name" value="{{$shopinfo->shop_name}}">
						</div>

						<div class="form-group">
							<label class="bold  uppercase">Shop Address:</label>
							<input type="text" class="form-control" placeholder="Enter ..." name="shop_address"  value="{{$shopinfo->shop_address}}">
						</div>
						<div class="form-group">
							<label class="bold  uppercase">Base Currency Text:</label>
							<input type="text" class="form-control" placeholder="Enter ..." name="currency_text" value="{{$shopinfo->currency_text}}">
						</div>

						<div class="form-group">
							<label for="exampleInputFile" class="bold  uppercase">File input</label>

							{!! Form::file('shop_image') !!}

							<p class="help-block">Supported file formate: jpg, jpeg & png</p>
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group ">
							<label class="bold  uppercase">Shop Email Address:</label>
							<input type="text" class="form-control" placeholder="Enter ..." name="shop_email" value="{{$shopinfo->shop_email}}">
						</div>
						<div class="form-group">
							<label class="bold  uppercase">Shop Contact Number:</label>
							<input type="text" class="form-control" placeholder="Enter ..." name="shop_contact_number" value="{{$shopinfo->shop_contact_number}}">
						</div>

						<div class="form-group">
							<label class="bold  uppercase">Front End Base Color Code [Without Hash]:</label>
							<input type="text" class="form-control" placeholder="Enter ..." name="color_code" value="{{$shopinfo->color_code}}">
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<button type="submit" class="btn dark btn-outline btn-block bold uppercase" name="singleOrderAction" id="singleOrderAction"> Submit </button>
						</div>

					</div>
				</div>

				</div>

			<div class="panel-footer">

			</div>
		</div>
		</div>
	</div>
{!! Form::close() !!}
@endsection