@extends('admin.layouts.master')

@section('content')
   <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">All Payment List</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="payment_table">
                                          <thead>
                                              <tr>
                                                <th>#</th>
                                                <th>Ref</th>
                                                <th>CustomerName</th>
                                                <th>LastPayment Date</th>
                                                <th>Total Due</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                        <tbody>
                              @php
                                $i = 1
                              @endphp
                       @foreach($orders as $order)
                           <tr>
                              <input  type="hidden" name="order_id" id="order_id" class="order_id" value="{{$order->id}}">
                               <input  type="hidden" name="order_id" id="service_ref" class="service_ref" value="{{$order->service_ref}}">
                                <input  type="hidden" name="order_id" id="service_cus_name" class="service_cus_name" value="{{$order->service_cus_name}}">
                              <td>
                                {{$i++}}
                              </td>
                              <td>{{$order->service_ref}}</td>
                              <td>{{$order->service_cus_name}}</td>
                              <td>
                                @php
                                  $lpayment = $order->payments->last()
                                @endphp
                                {{ Carbon\Carbon::parse($lpayment['created_at'])->format('d-m-Y')}}
                              
                              </td>
                               <td>
                                  @php $total = $order->payments->sum('received_amount') + $order->payments->sum('add_discount_amount')@endphp
                                  <b> {{$sinfo->currency_text}} </b> {{number_format(($total-$order->total_amount),2)}}
                              </td>
                                     

                               <td> <button type="button" class="btn btn-success" data-toggle="modal" id="paymentButton" data-target="#myModal{{$order->id}}">Payments Details</button>

                                  <!--1st Modal -->
                                  <div id="myModal{{$order->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Payment History of <b> {{$order->service_cus_name}}</b> & Ref: <b>{{$order->service_ref}}</b> </h4>
                                        </div>
                                        <div class="modal-body">
                                          <table class="table table-bordered table-striped" >
                                            <thead>
                                              <tr>
                                                 <th>Transaction  Id</th>
                                                 <th>Received Date: </th>
                                                 <th>Amount</th>
                                               </tr>
                                              </thead>
                                            <tbody>
                                              @foreach($order->payments as $payment)
                                              <tr>
                                                <td>{{$order->service_ref}}{{$payment->id}}</td>
                                                <td>{{Carbon\Carbon::parse($payment->created_at)->format('d-m-Y')}}</td>
                                                <td><b> {{$sinfo->currency_text}} </b> {{number_format($payment->received_amount,2)}}</td>
                                              </tr>
                                             @endforeach
                                            </tbody>
                                             <tfoot>
                                                 <tr>
                                                   <th colspan="2">Total Received Amount: </th>
                                                 <th><b> {{$sinfo->currency_text}} </b> {{number_format($order->payments->sum('received_amount'),2)}}</th>
                                                 </tr>
                                                 <tr>
                                                   <th colspan="2">Cash Discount Amount: </th>
                                                 <th><b> {{$sinfo->currency_text}} </b> {{number_format($order->payments->sum('add_discount_amount'),2)}}</th>
                                                 </tr>
                                                  <tr>
                                                   <th colspan="2">Total Bill: </th>
                                                 <th><b> {{$sinfo->currency_text}} </b> {{number_format($order->total_amount,2)}}</th>
                                                 </tr>
                                                  <tr>
                                                   <th colspan="2">Total Due Amount: </th>
                                                 <th>@php $total = $order->payments->sum('received_amount') + $order->payments->sum('add_discount_amount')@endphp
                                                 <b> {{$sinfo->currency_text}} </b> {{number_format(($total-$order->total_amount),2)}}</th>
                                                 </tr>
                                              </tfoot>
                                          </table>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>

                                    </div>
                                  </div>

                              <button type="button" class="btn blue-madison" data-toggle="modal" id="paymentButton" data-target="#myModal2">Update Payment</button>
                             
                            </td>                   
                          
                          </tr>
                        @endforeach
                        </tbody>
                   </table>
                       <!--2st Modal -->
                               <div id="myModal2" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                         <input  type="hidden" name="submit_order_id" id="submit_order_id" class="submit_order_id" value="">  
                                      <!-- Modal content-->
                                      <div class="modal-content info">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Payment History of <b> <span id="customerName"></span> </b> & Ref: <b>  <span id="orderRef"></span> </b> </h4>
                                        </div>
                                        <div class="modal-body" id="modal">
                                          <table class="table table-bordered table-striped" >
                                            <thead>
                                              <tr>
                                                 <th>Date: </th>
                                                 <th>Amount</th>
                                                 <th>Discount</th>
                                               </tr>
                                              </thead>
                                            <tbody>
                                             
                                              <tr>
                                                <td>
                                                  <div class="input-group date">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                        <input  type="text" class="form-control pull-right createdpicker" name="payment_date" id="payment_date" required="">
                                                  </div>
                                                </td>
                                                <td>
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Enter ..." name="payment_amount" id="payment_amount" required="">
                                                  </div>
                                                </td>
                                                <td>
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Enter ..." name="add_discount_amount" id="add_discount_amount" required="">
                                                  </div>
                                                </td>
                                              </tr>
                            
                                            </tbody>
                                             <tfoot>
                                                 <tr>
                                                   <th colspan="3"> </th>
                                                 </tr>
                                              </tfoot>
                                          </table>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-default" id="submit-payment" >Submit</button>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
        </div>
   </div>           
   <script>
$(document).ready(function(){

            $('#payment_table').dataTable();
            var table = $('#payment_table').DataTable();

            var currentDate = new Date();
            $(".createdpicker").datepicker("setDate",currentDate);

            $('#payment_table').on('draw.dt', function () {
                var currentDate = new Date();
                $(".createdpicker").datepicker("setDate",currentDate);
            })

          $(document).on('click','#paymentButton',function(){
              var tr = $(this).parent().parent(); 
              var a = tr.find('.order_id').val();
              var b = tr.find('.service_ref').val();
              var c = tr.find('.service_cus_name').val();
              $("#customerName").text(c);
              $("#orderRef").text(b);
              $('#submit_order_id').val(a);
              //alert(a);
         });

          $(document).on('click','#submit-payment',function(){
               if($('#payment_amount').val()==''){
                  alert('Amount Field Empty');
                   return false;
                }else if(!$.isNumeric($('#payment_amount').val())) {
                   alert(' Need Number for Amount');
                   return false;
                }else if($('#payment_amount').val()==''){
                    //alert(' Need Number for Amount')
                    return true;
                }else if(($('#add_discount_amount').val().length > 0)){
                  if(!$.isNumeric($('#add_discount_amount').val())){
                     alert(' Need Number for Discount Amount')
                     return false;
                  }
                }

              var order_id            = $('#submit_order_id').val() ;  
              var payment_date        = $('#payment_date').val() ;
              var payment_amount      = $('#payment_amount').val() ;
              var add_discount_amount = $('#add_discount_amount').val() ;
                
              alert("Payment Update Sucessfull");
                $('#myModal2').modal('hide');
                 location.reload();
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                          });

              $.ajax({
                type:"POST",
                url:"{{route('set-payment')}}",
                data:{
                  'order_id'            :  order_id,
                  'payment_date'        :  payment_date,
                  'payment_amount'      :  payment_amount,
                  'add_discount_amount' :  add_discount_amount,
                },
                success:function(data){
                    console.log(data);
                }
              });
         });
})
    </script>
@endsection