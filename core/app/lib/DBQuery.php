<?php 
namespace App\lib;

use Users\User;
use Auth;
use App\Order;
use App\Orderdetail;
use DateTime;
use format;
use App\Service;
use DB;
use App\Payment;

class DBQuery
{
      //Active Query
	 public static function getServices(){
      $services = Service::All();
      return $services;
    }

    public static function saveOrder($request){

            $serviceRef = Custom::orderRef();
            $service_crete_date = Custom::dateConvertor($date = $request['service_crete_date']);
            $service_delivery_date = Custom::dateConvertor($date = $request['service_delivery_date']);
            $order = new Order(array(
                            'service_ref'              =>$serviceRef,
                            'service_status'           =>1,
                            'order_create_by'          =>$request->order_create_by,
                            'service_crete_date'       =>$service_crete_date,
                            'service_delivery_date'    =>$service_delivery_date,
                            'service_cus_name'         =>$request->service_cus_name,
                            'service_cus_email'        =>$request->service_cus_email,
                            'cell_number'              =>$request->cell_number,
                            'service_cus_address'      =>$request->service_cus_address,
                            'total_amount'             =>$request->total_amount,
                            'discount_amount'          =>$request->discount_amount,
                           
                            )); 
            $order->save();
            $payment = new Payment(array(
                            'order_id'              =>$order->id,
                            'received_amount'       =>$request->advance_amount,
                              ));
            $payment->save();
            $num_elements = 0;
            $orderdetails = array();
            while($num_elements < count($request->service_price)){
                
             $orderdetail =  new Orderdetail([
                    
                    'service_price'      => $request->service_price[$num_elements],
                    'service_quantity'   => $request->service_quantity[$num_elements],
                    'service_amount'     => $request->service_amount[$num_elements],
                    'service_measer'     => $request->service_measer[$num_elements],
                    'service_id'         => $request->service_id[$num_elements],
                ]); 

                $num_elements++;
                $orderdetails[] =  $orderdetail ;               
            }

      $order->orderdetails()->saveMany($orderdetails);
      return $order;
    }

    public static function saveUpdateOrder($request){

        $order = Order::updateOrCreate(
                                  
             ['id' => $request->order_id],
             [
                    'service_cus_name'         =>$request->service_cus_name,
                    'service_cus_email'        =>$request->service_cus_email,
                    'cell_number'              =>$request->cell_number,
                    'service_cus_address'      =>$request->service_cus_address,
                    'total_amount'             =>$request->total_amount,
                    'discount_amount'          =>$request->discount_amount,
              ]
           );

          $payment_id = Order::find($request->order_id)->payments->first()->id;

          Payment::updatedOrCreate(
              ['id'=>$payment_id],
              ['received_amount' => $request->advance_amount,]
          );
            $num_elements = 0;
            while($num_elements < count($request->service_price)){
            $orderdetail = Orderdetail::updateOrCreate(
                  ['id' => $request->orderdetail_id[$num_elements]],
                  [     
                  'service_price'      => $request->service_price[$num_elements],
                  'order_id'           => $order->id,
                  'service_quantity'   => $request->service_quantity[$num_elements],
                  'service_amount'     => $request->service_amount[$num_elements],
                  'service_measer'     => $request->service_measer[$num_elements],
                  'service_id'         => $request->service_id[$num_elements],
                   ]);
           
                    $num_elements++;
           }
    }

    public static function getOrdersByStatus($id){

      $activeOrders = Order::where('service_status',$id)->get();
      return $activeOrders;
    }

    public static function saveService($request){
       $service = new Service(array(
                            'service_name'            =>$request->service_name,
                            'service_price'           =>$request->service_price,
                            'service_create_by'       =>$request->service_create_by,
                           
                            ));
             
            $service->save();
            return $service;
    }

}
