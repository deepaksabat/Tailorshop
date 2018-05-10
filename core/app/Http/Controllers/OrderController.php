<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Validator;
use Illuminate\Support\Facades\Input;
use App\lib\Custom;
use App\lib\DBQuery;
use App\Order;
use DB;
use App\Orderdetail;
use App\Session;
use App\ShopInfo;
use App\Payment;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getOrders(){

        $orders = Order::All();
        return view('order.allorderlist',compact('orders'));
    }

    public function getOrderajax($cat_id)
    {  
        $orders = Service::where('id',$cat_id)->first();
        return $orders;
    }

    public function addOrder()
    {
            $services = Service::where('active_status',0)->get();
            return view('order.addneworder',compact('services'));    
    }

     public function saveOrder(Request $request)
    { 

        if($request->discount_amount==""){
            $validator = Validator::make(Input::all(), Order::$rules);
            $request['discount_amount']=0;
        }else{
            $validator = Validator::make(Input::all(), Order::$numberrules);
        }


        if($validator->fails()){
            $services = Service::where('active_status',0)->get();
            return view('order.addneworder',compact('services'))->withErrors($validator);
        }else{
            
            $order = DBQuery::saveOrder($request);
            //return   $order;
            $shopinfo = ShopInfo::find(1);
            $total_bill_word = Custom::convert_number_to_words($number = $order->total_amount);
            return view('report.invsaveprint',compact('order','shopinfo','total_bill_word'));

        }
    }

    public function addOrderExCustomer($order_id)
    {       $order = Order::where('id',$order_id)->first();
            $services = Service::where('active_status',0)->get();
            return view('order.addneworderexcus',compact('services','order'));    
    }

     public function saveOrderExCustomer(Request $request)
    {
        $validator = Validator::make(Input::all(), Order::$rules);

        if($validator->fails()){
            $services = Service::where('active_status',0)->get();
            $order = Order::where('id',$request->order_id)->first();
            return view('order.addneworderexcus',compact('services','order'))->withErrors($validator);
        }else{
            
            $order = DBQuery::saveOrder($request);
            $shopinfo = ShopInfo::find(1);
            $total_bill_word = Custom::convert_number_to_words($number = $order->total_amount);
            return view('report.invupdateprint',compact('order','shopinfo','total_bill_word'));

        }
    }

    public function updateOrderById($order_id){ 
        $order = Order::where('id',$order_id)->first();
        $services = Service::All();
        return view('order.editOrder',compact('services','order'));
    }

    public function saveUpdateOrderById(Request $request){

        $validator = Validator::make(Input::all(), Order::$rules);

        if($validator->fails()){
            $services = Service::where('active_status',0)->get();
            $order = Order::where('id', '=', $request->order_id)->first();
            return view('order.editOrder',compact('services','order'))->withErrors($validator);
        }else{
            DBQuery::saveUpdateOrder($request);
            $order = Order::where('id', '=', $request->order_id)->first();
            $shopinfo = ShopInfo::find(1);
            $total_bill_word = Custom::convert_number_to_words($number = $order->total_amount);
            return view('report.newinvoice',compact('order','shopinfo','total_bill_word'));
        }
   
    }

    public function deliveryOrderById($order_id){
        $order = Order::where('id',$order_id)->first();
        $services = Service::All();
        return view('order.deliveryorder',compact('services','order'));
    }

    public function saveDeliveryOrderById($order_id){
             Order::where('id',$order_id)
                ->update(array('service_status' => 3));
        $order = Order::where('id',$order_id)->first();
        return view('order.deliveryorder',compact('order'));
    }
    
}
