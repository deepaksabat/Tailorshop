<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutPrice extends Model
{
    protected $table = "about_price";

    protected $fillable = array('heading', 'details');
}
