<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderdetails()
	{
		return $this->hasmany('App\Orderdetail');
	}

	public function users() 
    {
		return $this->belongsTo('App\User');
	}
}
