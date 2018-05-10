<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $table = "services";

   	protected $fillable = [	
                            'service_name',
                            'service_price',
                            'active_status',
                        ];

    public static $rules = array(
                    'service_name'        =>'required|unique:services',
                    'service_price'      =>'required|numeric',
               
        );

     public static $updateRules = array(


                    'service_name'       =>'required|unique:services',
                    'service_price'      =>'required|numeric',
               
        );
    public static $updateNewRules = array(

        'service_price'      =>'required|numeric',

    );


     public function service() {

        return $this->belongsTo('App\Orderdetail');
        //return $this->>belongsTo('App\Order');
    }
}
