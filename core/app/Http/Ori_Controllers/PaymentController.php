<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Order;
use App\lib\Custom;

class PaymentController extends Controller
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

    public function getPayments()
    {
    	//$orders = Order::paginate('15');
    	$orders = Order::All();
  		return view('payment.allpayments',compact('orders'));
    	//return $orders->payments;
    }
    public function postPayment(Request $request){
        $date = Custom::dateConvertor($request->payment_date);
        $payment = new Payment(array(
            'order_id'               => $request->order_id,
            'payment_date'           => $date,
            'received_amount'        => $request->payment_amount,
            'add_discount_amount'    => $request->add_discount_amount,
             ));
        $payment->save();
        return $payment;
    }

        public function getPaymentsAjax(Request $request)
        {

            //return 'ok';
            $columns = array(
                0 =>'id',
                1 =>'service_ref',
                2=> 'service_cus_name',
                3=> 'created_at',
                4=> 'id',
            );

            $totalData = Order::count();

            $totalFiltered = $totalData;

            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if(empty($request->input('search.value')))
            {
                $posts = Order::offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else {
                $search = $request->input('search.value');

                $posts =  Order::where('id','LIKE',"%{$search}%")
                    ->orWhere('service_ref', 'LIKE',"%{$search}%")
                    ->orWhere('service_cus_name', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

                $totalFiltered = Order::where('id','LIKE',"%{$search}%")
                    ->orWhere('service_ref', 'LIKE',"%{$search}%")
                    ->orWhere('service_cus_name', 'LIKE',"%{$search}%")
                    ->count();
            }

            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    //$show =  route('posts.show',$post->id);
                    //$edit =  route('posts.edit',$post->id);

                    $nestedData['id'] = $post->id;
                    $nestedData['service_ref'] = $post->service_ref;
                    $nestedData['service_cus_name'] = $post->service_cus_name;
                    $nestedData['created_at'] = date('j M Y h:i a',strtotime($post->created_at));
                    $nestedData['options'] = "&emsp;<a href='#' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                                  &emsp;<a href='#' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
                    $data[] = $nestedData;

                }
            }

            $json_data = array(
                "draw"            => intval($request->input('draw')),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data"            => $data
            );

            return json_encode($json_data);

        }

}
