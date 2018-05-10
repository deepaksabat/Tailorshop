@extends('admin.layouts.master')

@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role= "alert">
        <strong>Successful:</strong>
            {!! session('success') !!}
    </div>
@endif

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
{!! Form::open(['url' => '/save-order', 'method' => 'post']) !!}
<input name="order_create_by" type="hidden" value="{{ Auth::user()->id }}">
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
	                  <input type="text" class="form-control" placeholder="Enter ..." name="service_cus_name">
	                </div>

	                <div class="form-group">
	                  <label>Email Address:</label>
	                  <input type="email" class="form-control" placeholder="Enter ..." name="service_cus_email">
	                </div>
		              <!-- /.form-group -->
		        </div>
	            <!-- /.First Box End -->
	            <div class="col-md-6">
					<div class="form-group">
		                <label>Cutomer Address:</label>
		                <textarea class="form-control" rows="3" placeholder="Enter ..." style="height: 109px" name="service_cus_address"></textarea>
                	</div>
	              	<!-- /.form-group -->
		        </div>
		        <div class="col-md-6">
	              	<div class="form-group">
	                		<label>Order Create Date:</label>
	                	<div class="input-group date">
	                  		<div class="input-group-addon">
	                    		<i class="fa fa-calendar"></i>
	                  		</div>
	                  			<input type="text" class="form-control pull-right dpicker" name="service_crete_date">
	                	</div>
	                <!-- /.input group -->
	              	</div>
	            </div>
	            <div class="col-md-6">
	              	<!-- /.form-group -->
	              	<div class="form-group">
	                	<label>Order Delivery Date:</label>
		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  	<input type="text" class="form-control pull-right dpicker" name="service_delivery_date">
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
  <!-- /.2nd box-body -->
        
    </div>
    <!-- /.2nd Body ody -->
 <div style="max-width:1024px; margin:auto">   	
    <!-- SELECT2 EXAMPLE -->
	    <div class="box box-default" >
	        <div class="box-header with-border" style="height:50px">
	          <h3 class="box-title">Service Details with Measurement</h3>

	          <div class="box-tools pull-right" >
	          <button type="button" class="btn bg-purple btn-flat" id="addService" style="margin:5px 50px 0 0" disabled="disabled"> Add Another Service </button>
	          </div>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">
	        <div>
	            <div class="col-md-2">
		             <label>Select Service</label>
		        </div>
	            <!-- /.First Box End -->
	            <div class="col-md-2" style="width:150px">
                	<label>Price(1):</label>
		        </div>
	              <!-- /.form-group -->
	            <div class="col-md-2">
		                	<label>Quantity:</label>
		        </div>
		        <div class="col-md-2" style="width:150px">              
	                	<label>Amount:</label>
		        </div>
		        <div class="col-md-2" style="width:280px">	
		             	<label>Measurements: </label>
		        </div>
		        <div class="col-md-1">
	                	<label>Action</label>     
		        </div>
	         </div>
	          <div class="row serviceRow"  id="orderBox">
	            <div class="col-md-2">
	              	<div class="form-group">
		                <select class="form-control service_id" style="width: 100%;" name="service_id[]" id="service_id">
		                  <option selected="selected" disabled="disabled" value="0">Select Service</option>
		                  @foreach($services as $service)
		                  <option value="{{$service->id}}">{{$service->service_name}}</option>
		                  @endforeach
		                </select>
		            </div>
		        </div>
	            <!-- /.First Box End -->
	            <div class="col-md-2" style="width:150px">
	              	<!-- /.form-group -->
	              	<div class="form-group">
	                	
	                	 <input type="text" class="form-control service_price" placeholder="" name="service_price[]" id="service_price" readonly>
		            </div>
		        </div>
	              <!-- /.form-group -->
	            <div class="col-md-2">
		              	
		              	<div class="form-group">
		                	
			                 <input type="text" class="form-control service_qty" placeholder="Enter ..." id="service_qty" name="service_quantity[]">
			            </div>
		        </div>
		        <div class="col-md-2" style="width:150px">
		              	<div class="form-group">
	                	
		                <input type="text" class="form-control amount" placeholder="Enter ..." id="amount" name="service_amount[]" readonly>
		            </div>	
		        </div>
		        <div class="col-md-2" style="width:300px">
	              	
		            <div class="form-group">
		                
			                 <input type="text" class="form-control" placeholder="Enter ..." name="service_measer[]">
			            </div>
		        </div>
		        <div class="col-md-1">
	              
	              	<div class="form-group">
	                	
		                <button type="button" class="btn bg-maroon btn-flat removeService" id="removeService" style="display:block" disabled="disabled"> Delete</button>
		            </div>
		        </div>
	         </div>
	            <!-- /.col -->
	        </div>
	          <!-- /.row -->
	    </div>
  <!-- /.First box-body -->     
    </div>
    <div class="box-footer" style="max-width:1024px; margin:auto">
    	<div class="row">
    		<div class="col-md-4">
    		<div class="input-group">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-success">Total Amount</button>
                </div>
                <!-- /btn-group -->
                <input type="text" class="form-control" id="total" name="total_amount" style="font-size:25px; font-weight: bold">
              </div>
            </div>
    		<div class="col-md-4">	
    		<div class="input-group">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-info">Discount Amount</button>
                </div>
                <!-- /btn-group -->
                <input type="text" class="form-control" id="discount" name="discount_amount" style="font-size:25px;  font-weight: bold">
              </div>
             </div>
    		<div class="col-md-4">
                   <button type="submit" class="btn bg-olive btn-flat " style="display:inline-block; width:300px" >Submit Order</button>
    		</div>
    	</div>          
    </div>
 {!! Form::close() !!}
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript">
$(document).ready(function(){
	$("#addService").removeAttr("disabled");

    $("#addService").click(function(){
     //
     	//alert('addButton');
     var serviceRowQty = $('.serviceRow').length;
      //alert(serviceRowQty);        
          $("#orderBox:last").clone(true).insertAfter("div.serviceRow:last");
          $("div.serviceRow:last input").val('');
          $("div.serviceRow:last select").prop('selectedIndex',0);
          $("div.serviceRow:last label").text('');
          $("div.serviceRow .removeService").prop('disabled', false);
           return false;
  
    })

    $(document).on("click" , "#removeService" , function()  {
      //alert('deletebutton');
      var serviceRowQty = $('.serviceRow').length;
        if (serviceRowQty == 1){
            $("div.serviceRow .removeService").prop('disabled', true);
             return false;
             $(".serviceRow").css("display", "block");
        }else{
          $(this).closest('.serviceRow').remove();

           if(serviceRowQty==1){
            //return false;
            $("div.serviceRow .removeService").prop('disabled', true);
            return false
          }else{

            $("div.serviceRow .removeService").prop('disabled', false);
          }
          //$(".serviceRow").remove();
         
            return false;
        }
            alert();
          return false;
    });




       		$('.serviceRow').delegate('.service_id','change',function(){
       		  //alert('selectButton');
       		var subdiv = $(this).parent().parent().parent();
       		var cat_id = $(this).closest('.serviceRow').find('.service_id option:selected').attr('value');
       		//subdiv.find('.service_price').val('');
       		
       		 //var a = 
       		 //alert(totalamount()); 

			$.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        	
        	});

			$.ajax({

	                type     : 'get',
	                url      : '/get-orders-list-jason/'+cat_id+'',
	                dataType : 'json',
	                //date 	 : { cat_id: cat_id},
	                success:function(data){
	                	//var subdiv = $(this).parent().parent().parent();
	                	 subdiv.find('.service_price').val(data.service_price);
	                	 var price = subdiv.find('.service_price').val(); 
			       		 var qty = subdiv.find('.service_qty').val(); 
			       		 var total = data.service_price * qty ;
			       		 subdiv.find('.amount').val(total);
			       		 $('#total').val(totalamount());
	                   	//alert(data.service_price);
	                    },

	                error: function(error) {
				          alert("Data retrive faield");
				        }

           			});


       	 	$(".serviceRow").delegate('.service_qty', "keyup",function(){
       			   //alert('keyup');
       			 var subdiv = $(this).parent().parent().parent();
       			 var price = subdiv.find('.service_price').val(); 
	       		 var qty = subdiv.find('.service_qty').val();
	       		 var discount = $('#discount').val(); 
	       		 var total = price * qty ;
	       		 subdiv.find('.amount').val(total);
	       		 $('#total').val(totalamount());
       			 //alert('background-color');
       			 //$("p").css("background-color", "pink");
    		});

    		$("#discount").keyup(function(){
    				 $('#total').val(totalamount());
			});



    		
    		function totalamount(t){
				var t=0;
				$('.amount').each(function(i,e){
					var amt = $(this).val()-0;
					t+=amt;
					
				});
				 var d = $('#discount').val();
					total = t-d;
				return total;

				$('.total').html(t);
			}

    	});
    
})

    </script>

@endsection