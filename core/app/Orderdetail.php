<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = "orderdetails";

        protected $fillable = [ 
                            'order_id',
                            'service_id',
                            'service_price',
                            'service_quantity',
                            'service_amount',
                            'service_measer',
                            'service_id',
                            
                        ];

    public function order() {

        return $this->belongsTo('App\Order');
        //return $this->>belongsTo('App\Order');
    }


    public function service() {

        return $this->belongsTo('App\Service','service_id','id');
        //return $this->>belongsTo('App\Order');
    }
}
