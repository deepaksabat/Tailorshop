@extends('admin.layouts.master')

@section('content')
<style type="text/css">

</style>
@if(Session::has('success'))
    <div class="alert alert-success" role= "alert">
        <strong>Successful:</strong>
            {!! session('success') !!}
    </div>
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
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-equalizer font-red-sunglo"></i>
				<span class="caption-subject font-red-sunglo bold uppercase">Order Submission</span>
				<span class="caption-helper">Service Details</span>
			</div>
			<div class="tools">
				<a href="" class="collapse"> </a>
				<a href="#portlet-config" data-toggle="modal" class="config"> </a>
				<a href="" class="reload"> </a>
			</div>
		</div>
		<div class="portlet-body form">
			<!-- BEGIN FORM-->
			<form action="{{url('admin/save-order')}}" class="form-horizontal" method="POST">
				<input name="order_create_by" type="hidden" value="{{ Auth::user()->id }}">	
				<div class="form-body">
					 {{ csrf_field() }}
					<h3 class="form-section">Customer Info</h3>
						<!--Start Customer Area-->
							<div class="row">
					            <div class="col-md-6">
						            <!-- text input -->
					                <div class="form-group">
					                  <label class="control-label col-md-4">Customer Name:</label>
					                  	<div class="col-md-8">
					                  		<input type="text" class="form-control" placeholder="Enter ..." name="service_cus_name" id="service_cus_name">
					                	</div>
					           		</div> 
					           
					                <div class="form-group">
					                  <label class="control-label col-md-4">Email Address:</label>
					                  	<div class="col-md-8">
					                	  	<input type="email" class="form-control" placeholder="Enter ..." name="service_cus_email" id="service_cus_email">
					                	</div>
					                </div>
						        
					              	<div class="form-group">
					                	<label class="control-label col-md-4">Order Create Date:</label>
							              	<div class="col-md-8">	
								               	<div class="input-group date">
								               		<div class="input-group-addon">
								                   		<i class="fa fa-calendar"></i>
								               		</div>
								               			<input type="text" class="form-control pull-right createdpicker" name="service_crete_date" id="service_crete_date">
								               	</div>
					              			</div>
					              	</div>
					            </div>  
					            <div class="col-md-6">
									
					                <div class="form-group">
					                  <label class="control-label col-md-4">Cell Number:</label>
					                  	<div class="col-md-8">
					                	  	<input type="text" class="form-control" placeholder="Enter ..." name="cell_number" id="cell_number">
					                	</div>
					                </div>

					              	<div class="form-group">
					                	<label class="control-label col-md-4">Order Delivery Date:</label>
								            <div class="col-md-8">
								                <div class="input-group date">
								                  <div class="input-group-addon">
								                    <i class="fa fa-calendar"></i>
								                  </div>
								                  	<input type="text" class="form-control pull-right dpicker" name="service_delivery_date" id="service_delivery_date">
								                </div>
								            </div>
						            </div>
						        </div>
					        </div>

					        <div class="row">
					            <div class="col-md-12">
						           <div class="form-group">
						                <label class="control-label col-md-2">Cutomer Address:</label>
						                	<div class="col-md-10">
												<textarea class="form-control" rows="3" placeholder="Enter ..." name="service_cus_address" id="service_cus_address"></textarea>
											</div>
				                	</div>
						        </div>
					        </div>
						<!--End Customer Area-->
						<!--Start Service Order Area-->				
					<div class="form-section">
						<h3 class="inlineBlock">Service Details with Measurement</h3>
						<button type="button" class="btn dark flot-right " id="addService" disabled="disabled"> Add Another Service </button>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="col-md-11">
				             <label>Select Service</label>
							</div>
				        </div>
			            <div class="col-md-2">
							<div class="col-md-10">
		                	<label>Rate:</label>
							</div>
				        </div>
			            <div class="col-md-2">
							<div class="col-md-10">
				                	<label>Quantity:</label>
							</div>
				        </div>
				        <div class="col-md-2">
							<div class="col-md-10">
			                	<label>Amount:</label>
							</div>
				        </div>
				        <div class="col-md-3">
							<div class="col-md-10">
			                	<label>Action</label>
							</div>
				        </div>
					</div>

					<div class="row serviceRow redBorder"  id="orderBox">
			            <div class="col-md-3">
			              	<div class="form-group">
					              <div class="col-md-11">
					              	<select class="form-control service_id" name="service_id[]" id="service_id">
					                	<option selected="selected" disabled="disabled" value="0">Select Service</option>
					                 	@foreach($services as $service)
					                  	<option value="{{$service->id}}">{{$service->service_name}}</option>
					                  @endforeach
					                </select>
					              </div>
				            </div>
				        </div>
			            <div class="col-md-2">
			              	<div class="form-group">
			                	<div class="col-md-10">
			                		<input type="text" class="form-control service_price" placeholder="Rate" name="service_price[]" id="service_price" readonly>
				            	 </div>
				            </div>
				        </div>
			            <div class="col-md-2">
				              	<div class="form-group">
					                <div class="col-md-10">
					                	<input type="text" class="form-control service_qty" placeholder="Quantity" id="service_qty" name="service_quantity[]">
					                </div>
					            </div>
				        </div>
				        <div class="col-md-2">
				              	<div class="form-group">
				                	<div class="col-md-10">
				                		<input type="text" class="form-control amount" placeholder="Total" id="amount" name="service_amount[]" readonly>
				            </div>	</div>
				        </div>
				        <div class="col-md-3">
			              	<div class="form-group">
				                	<div class="col-md-10">
				                		<button type="button" class="btn removeService red btn-block" id="removeService" disabled="disabled"> Delete</button>
				                	</div>
				            </div>
				        </div>

						<div class="row pading-margin-zero">
							<div class="col-md-12 col-md-offset-1">
								<div class="form-group">
									<div class="col-md-10" >
										<textarea type="text" class="form-control service_measer" placeholder="Enter Measurement of Service ..." name="service_measer[]"></textarea>
									</div>
								</div>
							</div>
						</div>

	         		</div>



	         		<!--End Service Order Area-->
				</div>
			<!--Start Form Footer Area-->	
				<div class="form-action">
					<div class="row">
			    		<div class="col-md-3">
			    		<div class="input-group">
			                <div class="input-group-btn">
			                  <button type="button" class="btn btn-success">Total Amount</button>
			                </div>
			                <!-- /btn-group -->
			                <input type="text" class="form-control" id="total" name="total_amount" style="font-size:25px; font-weight: bold">
			              </div>
			            </div>
			    		<div class="col-md-3">	
			    		<div class="input-group">
			                <div class="input-group-btn">
			                  <button type="button" class="btn btn-info">Discount Amount</button>
			                </div>
			                <!-- /btn-group -->
			                <input type="text" class="form-control" id="discount" name="discount_amount" style="font-size:25px;  font-weight: bold">
			              </div>
			             </div>
			             <div class="col-md-3">	
			    		<div class="input-group">
			                <div class="input-group-btn">
			                  <button type="button" class="btn btn-warning">Advance Amount</button>
			                </div>
			                <!-- /btn-group -->
			                <input type="text" class="form-control" id="advance_amount" name="advance_amount" style="font-size:25px;  font-weight: bold">
			              </div>
			             </div>
			    		<div class="col-md-3">
			                   <button type="submit" class="btn purple btn-block">Submit Order</button>
			    		</div>
			    	</div> 
				</div>
			<!--End Form Footer Area-->
		</form>

	</div>
<script>

        jQuery(document).ready(function() {

            //Commom Script
            $('.dpicker').datepicker({
                autoclose: true
            })
            var currentDate = new Date();
            $(".createdpicker").datepicker("setDate",currentDate);
            $("#loader").css("display",'none');
            $("#myDiv").removeAttr("style");
            $("#addService").removeAttr("disabled");

            //Start Order Form
            $('form').submit(function() {
                if ($.trim($("#service_cus_name").val()) === "") {
                    alert('Customer Name Field Empty');
                    return false;
                }else if( $.trim($("#service_cus_email").val()) === ""){
                    alert('Email Address Field Empty');
                    return false;
                }else if( $.trim($("#cell_number").val()) === ""){
                        alert('Cell Number Field Empty');
                        return false;
                }else if( $.trim($("#service_crete_date").val()) === ""){
                    alert('Create Date Field Empty');
                    return false;
                }else if( $.trim($("#service_delivery_date").val()) === ""){
                    alert('Delivery Date Field Empty');
                    return false;
                }else if( $.trim($("#service_cus_address").val()) === ""){
                    alert('Customer Address Field Empty');
                    return false;
                }
                var flag = 0;
                $(".service_qty").each(function(i){
                    if ($(this).val() == "")
                        flag++;
                });
                if(flag==0){
                    flagNew=0
                    $(".service_measer").each(function(i){
                        if ($(this).val() == "")
                            flagNew++;
                    });
                    if(flagNew==0){
                        return true;
                    }else{
                        alert("All Measurement Fileds Requried");
                        return false;
                    }
                }else{
                    alert("All Service Quantity Fileds Requried");
                    return false;
                }




            });


            $("#addService").click(function(){
                //
                //alert('addButton');
                var serviceRowQty = $('.serviceRow').length;
                //alert(serviceRowQty);
                $("#orderBox:last").clone(true).insertAfter("div.serviceRow:last");
                $("div.serviceRow:last input").val('');
                $("div.serviceRow:last textarea").val('');
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
                ;
                var subdiv = $(this).parent().parent().parent().parent();
                var cat_id = $(this).closest('.serviceRow').find('.service_id option:selected').attr('value');
                subdiv.find('.service_price').val('');
                //alert(cat_id);
                //var a =
                //alert(totalamount());

                $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }

                });

                $.ajax({

                    type     : 'get',
                    url      : 'get-orders-list-jason/'+cat_id+'',
                    dataType : 'json',
                    //date   : { cat_id: cat_id},
                    success:function(data){
                        console.log(data);
                        subdiv.find('.service_price').val(data.service_price);
                        var price = subdiv.find('.service_price').val();
                        var qty = subdiv.find('.service_qty').val();
                        var total = data.service_price * qty ;
                        subdiv.find('.amount').val(total);
                        $('#total').val(totalamount());
                        //alert(alert(JSON.stringify(subdiv)));
                    },

                    error: function(error) {
                        //alert("Data retrive faield");
                    }

                });


                $(".serviceRow").delegate('.service_qty', "keyup",function(){
                    //alert('keyup');
                    var subdiv = $(this).parent().parent().parent().parent();
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

            $('.serviceRow').each(function() {
                $(this).find('select').change(function(){//alert($(this).val())
                    if( $('.serviceRow').find('select option[value='+$(this).val()+']:selected').length>1){
                        $(this).val($(this).css("border","1px red solid"));
                        alert('option is already selected');
                        $(this).val($(this).find("option:first").val());
                    }else{
                        $(this).css("border","1px #D2D6DE solid");
                    }

                });
            });
        });
	</script>
@endsection