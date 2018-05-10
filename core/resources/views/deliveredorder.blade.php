@extends('admin.layouts.master')

@section('content')
<style type="text/css">
  a{
    text-decoration:none;
    color: #FFFFFF;
  }
  table{
    font-size: 15px;
  }
  .databutton{
    margin: 0;
    width: 100px;
  }
</style>  
<div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">All Order of Service</h3>
        <div class="row">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>ServiceRef</th>
                  <th>CustomerName</th>
                  <th>CustomerEmail</th>
                  <th>CreateDate</th>
                  <th>Delivery</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Active</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->service_ref}}</td>
                    <td>{{$order->service_cus_name}}</td>
                    <td>{{$order->service_cus_email}}</td>
                    <td>{{$order->service_crete_date}}</td>
                    <td>{{$order->service_delivery_date}}</td>
                    <td>{{number_format($order->total_amount,2)}}</td>
                      @if($order->service_status==1)
                      <td>
                        <button type="submit" class="btn bg-navy btn-flat margin databutton"> On Process</button>
                      </td>
                      @elseif($order->service_status==2)
                      <td>
                        <button type="button" class="btn bg-olive btn-flat margin databutton">Delivered</button>
                      </td>
                      @elseif($order->service_status==3)
                      <td>
                        <button type="button" class="btn bg-purple btn-flat margin databutton">Ready</button>
                      </td>
                      @endif
                      @if(checkPermission(['salesman','admin']))
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
                <tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div> 
    </div>
</div>
 <script>
</script> 
          
@endsection