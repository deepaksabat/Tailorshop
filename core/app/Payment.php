<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $table = "payments";

        protected $fillable = [ 
        	 				'order_id',
                            'received_amount',
                            'payment_date',
                            'add_discount_amount',     
                        ];

    public function order() {

        return $this->belongsTo('App\Order');
        //return $this->>belongsTo('App\Order');
    }
}
