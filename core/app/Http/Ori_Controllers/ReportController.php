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
use PDF;
use App;
use App\ShopInfo;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($order_id)
    {

       $order = Order::where('id',$order_id)->first();
       $shopinfo = ShopInfo::find(1);
       $total_bill_word = Custom::convert_number_to_words($number = $order->total_amount);
        return view('report.invoiceprint',compact('order','shopinfo','total_bill_word'));
    }

    public function getActiveOrders(){
      $orders = DBQuery::getOrdersByStatus($id = 1);
      return view('activeorders',compact('orders'));
    }

    public function getDeliveredOrders(){
      $orders = DBQuery::getOrdersByStatus($id = 2);
      return view('deliveredorder',compact('orders'));
    }


}
