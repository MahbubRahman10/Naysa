<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    public function orders() 
    {
		return $this->belongsTo('App\Order');
	}
}
