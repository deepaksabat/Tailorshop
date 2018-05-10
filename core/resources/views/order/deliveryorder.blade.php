@extends('admin.layouts.master')

@section('content')
    <div class="portlet-body">


    <div class="portlet light form-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-social-dribbble font-green"></i>
                <span class="caption-subject font-green bold uppercase">Order Details (Order Ref Number: {{$order->service_ref}})</span>
            </div>
        </div>
        <table class="table table-hover table-striped table-bordered">
            <tr>
                <td> Customer Name: </td>
                <td>
                    {{$order->service_cus_name}}
                </td>
            </tr>
            <tr>
                <td> Customer eMail Address: </td>
                <td>
                    {{$order->service_cus_email}}
                </td>
            </tr>
            <tr>
                <td> Cutomer Address: </td>
                <td>
                    {{$order->service_cus_address}}
                </td>
            </tr>
            <tr>
                <td> Number of Service: </td>
                <td>
                    {{$order->orderdetails->sum('service_quantity')}}
                </td>
            </tr>
            <tr>
                <td> Order Received Date: </td>
                <td>
                    {{$order->service_crete_date}}
                </td>
            </tr>
            <tr>
                <td> Order Delivery Date </td>
                <td>
                    {{$order->service_delivery_date}}
                </td>
            </tr>

        </table>
        <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">All Order of Service</h3>
                    <div class="row">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    @if(checkPermission(['salesman','admin','superadmin']))
                                        <th class="alingcenter">Unit Price</th>
                                    @endif
                                    <th class="alingcenter">Unit Quantity</th>
                                    @if(checkPermission(['salesman','admin','superadmin']))
                                        <th class="alingright">Amount</th>
                                    @endif
                                    <th class="alingcenter" >Measurements</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1
                                @endphp
                                @foreach($order->orderdetails as $orderdetail)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$orderdetail->service->service_name}}</td>
                                        @if(checkPermission(['salesman','admin','superadmin']))
                                            <td class="alingcenter">{{$orderdetail->service->service_price}}</td>
                                        @endif
                                        <td class="alingcenter">{{$orderdetail->service_quantity}} </td>
                                        @if(checkPermission(['salesman','admin','superadmin']))
                                            <td class="alingright">{{$orderdetail->service_amount}}</td>
                                        @endif
                                        <td class="alingcenter">{{$orderdetail->service_measer}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                @if(checkPermission(['salesman','admin','superadmin']))
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="alingright">Sub Total: </th>
                                        <th class="alingright">{{number_format($order->total_amount + $order->discount_amount, 2)}}</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="alingright">Discount Amount</th>
                                        <th class="alingright">{{number_format($order->discount_amount, 2)}}</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="alingright"><h5>Total Bill:</h5> </th>
                                        <th class="alingright"><h5>{{number_format($order->total_amount, 2)}}</h5>
                                        </th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

            <div class="modal-footer" >
                @if($order->service_status==1)
                    <td><button type="submit" class="btn success"> On Process</button></td>       @if(checkPermission(['salesman','admin']))
                        <a href="{{ action('OrderController@saveDeliveryOrderById', array('order_id' =>  $order->id)) }}"> <button type="submit" class="btn btn-success"> Click Delivery to Customer</button> </a>
                    @endif
                    @if(checkPermission(['tailor']))
                        <a href="{{ action('OrderController@saveDeliveryOrderById', array('order_id' =>  $order->id)) }}"> <button type="submit" class="btn yellow"> Click if Service Ready for Delivery</button> </a>
                    @endif
                @elseif($order->service_status==2)
                    <td><button type="button" class="btn blue-hoki">Delivered</button></td>
                    <a href="{{ action('OrderController@getOrders') }}"> <button type="submit" class="btn btn-info"> Go to order list</button> </a>
                @elseif($order->service_status==3)
                    <td><button type="button" class="btn yellow">Service Ready</button></td>
                    <a href="{{ action('OrderController@getOrders') }}"> <button type="submit" class="btn btn-info"> Go to order list</button> </a>
                @elseif($order->service_status==4)
                    <td><button type="button" class="btn success">Service Ready</button></td>
                    <a href="{{ action('OrderController@getOrders') }}"> <button type="submit" class="btn bg-purple btn-flat margin">
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- END PORTLET-->
@endsection