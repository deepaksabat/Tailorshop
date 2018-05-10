@extends('admin.layouts.master')

@section('content')

                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">All Order List</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-condensed flip-content" id="data-table-button">
                                       <thead>
                                        <tr>
                                          <th>OrderRef</th>
                                          <th>CustomerName</th>
                                          <th>CellNumber</th>
                                          <th>Amount</th>
                                          @if(checkPermission(['salesman','admin','superadmin']))
                                          <th>ExistsCustomer</th>
                                          @endif
                                          <th>Status</th>
                                          <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                          <tr>
                                            <td>{{$order->service_ref}}</td>
                                            <td>{{$order->service_cus_name}}</td>
                                            <td>{{$order->cell_number}}</td>
                                            <td> <b> {{$sinfo->currency_text}} </b>{{number_format($order->total_amount,2)}}</td>
                                              @if(checkPermission(['salesman','admin','superadmin']))
                                                 <td>
                                                    <button type="submit" class="btn blue newExButton"><a href="{{ action('OrderController@addOrderExCustomer', array('order_id' => $order->id)) }}" id="new-order-ex">Create Order</a></button>
                                                 </td>
                                              @endif
                                              @if($order->service_status==1)
                                              <td>
                                                <button type="submit" class="btn yellow crusta"> On Process</button>
                                              </td>
                                              @elseif($order->service_status==2)
                                              <td>
                                                <button type="button" class="btn purple">Delivered</button></td>
                                              @elseif($order->service_status==3)
                                              <td>
                                                <button type="button" class="btn green">Ready</button>
                                              </td>
                                              @endif
                                              @if(checkPermission(['salesman','admin','superadmin']))
                                              <td> <div class="btn-group">
                                                        <button type="button" class="btn btn-warning btn-flat databutton">Action</button>
                                                        <button type="button" class="btn btn-warning btn-flat dropdown-toggle " data-toggle="dropdown">
                                                          <span class="caret"></span>
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                         <ul class="dropdown-menu" role="menu">
                                                          <li><a href="{{ action('OrderController@updateOrderById', array('order_id' => $order->id)) }}">Update/Edit</a></li>
                                                          <li><a href="{{ action('OrderController@deliveryOrderById', array('order_id' =>  $order->id)) }}">Details/Delivery</a></li>
                                                          <li><a href="{{ action('ReportController@index', array('order_id' => $order->id)) }}">Invoice Print</a></li>
                                                        </ul>
                                                    </div>
                                                 </td>
                                              @endif
                                              @if(checkPermission(['tailor']))
                                             <td> <div class="btn-group">
                                                        <button type="button" class="btn btn-warning btn-flat databutton">Action</button>
                                                        <button type="button" class="btn btn-warning btn-flat dropdown-toggle " data-toggle="dropdown">
                                                          <span class="caret"></span>
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                         <ul class="dropdown-menu" role="menu">
                                                          <li><a href="{{ action('OrderController@deliveryOrderById', array('order_id' =>  $order->id)) }}">Order Details</a></li>
                                                        </ul>
                                                    </div>
                                                 </td>
                                              @endif
                                          </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#data-table-button').dataTable();
  })
</script>
@endsection
