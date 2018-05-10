<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    protected $table = "shopinfo";

    public static $rules = array(
                    'shop_name'        		=>'required',
                    'shop_address'      	=>'required',
                    'shop_email'      		=>'required',
                    'shop_contact_number'   =>'required',
                    'shop_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',



               
        );

    //required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
}
