<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Product extends Model
{
	use Rateable;
	
    public function productimage()
	{
		return $this->hasmany('App\Productimage');
	}

	public function productsize()
	{
		return $this->hasmany('App\Size');
	}

	public function productcolor()
	{
		return $this->hasmany('App\Color');
	}

	public function productreview()
	{
		return $this->hasmany('App\Review');
	}
}
