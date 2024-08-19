<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SearchController extends BaseController
{
  public function __construct()
  {
    // $this->middleware('auth:admin');
  }

  // Product Search
  public function search(Request $request)
  {
    $search = $request->search;
   
   
      $searchs = Product::where('product_name','LIKE',"%{$search}%")
      ->orderBy('created_at', 'desc')
      ->get();   

      $categories = Category::all();
      $allproducts = Product::all();

     return view('search.search',compact(['searchs','categories','search','allproducts']));
  }

}
