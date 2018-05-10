<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
	protected $table = "orders";

   	protected $fillable = [	
                            'service_ref',
                            'service_status',
                            'order_create_by',
                            'service_crete_date',
                            'service_delivery_date',
                            'service_cus_name',
                            'cell_number',
                            'service_cus_email',
                            'service_cus_address',                          
                            'total_amount',
                            'discount_amount',
                        ];

    public static $numberrules = array(
                    'service_cus_name'        =>'required',
                    'service_cus_address'     =>'required',
                    'service_cus_email'       =>'required',
                    'service_crete_date'      =>'required',
                    'service_delivery_date'   =>'required',
                    'total_amount'            =>'required',
                    'discount_amount'         =>'numeric|',
                    'cell_number'             =>'required|numeric',
                    'service_quantity.*'      =>'required|numeric',
                    'service_id.*'            =>'required',
                    'service_measer.*'        =>'required',
               
        );

    public static $rules = array(
        'service_cus_name'        =>'required',
        'service_cus_address'     =>'required',
        'service_cus_email'       =>'required',
        'cell_number'             =>'required|numeric',
        'service_crete_date'      =>'required',
        'service_delivery_date'   =>'required',
        'total_amount'            =>'required',
        'service_quantity.*'      =>'required|numeric',
        'service_id.*'            =>'required',
        'service_measer.*'        =>'required',

    );

    public function orderdetails() {

        //return $this->hasMany('App\OrderDetail','fid','id');
        return $this->hasMany('App\Orderdetail','order_id','id');
    }

    public function user() {

        //return $this->hasMany('App\OrderDetail','fid','id');
        return $this->hasOne('App\User','id','ser_act_create_by');
    }
    public function payments() {

        return $this->hasMany('App\Payment','order_id','id');
        //return $this->>belongsTo('App\Order');
    }
}
