<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Custom;
use App\Product;
use App\Review;
use App\Subcategory;
use Illuminate\Cache\delete;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use willvincent\Rateable\Rating;

class ProductController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // Home Page
    public function index()
    {
        // \Artisan::call('config:cache');
        $products  = Product::all();
        $customs = Custom::all();
    	return view('product.index',compact(['products','customs']));
    }

    // All Product
    public function product(Request $request)
    {   
        if ($request->sort) {
            $sort  = $request->sort;
            $show  = $request->show;
        }
        else{
            $sort = "product_name";
            $show = "10";
        }

        $allproducts = Product::limit('7')->get();

        $categories = Category::all();

        $products  = Product::orderBy($sort,'Asc')->limit($show)->get();
        $total  = Product::count();

        // Brand
        $brands  = Brand::all();

        // Custom Image
        $customs  = Custom::all();
        
        
        return view('product.product',compact(['allproducts','categories','products','sort','show','total','brands','customs']));
    }

    // show Single Product
    public function view($id, $name)
    {
        $product = Product::find($id);
        $products = Product::limit(5)->get();
        return view('product.single',compact(['product','products','id']));
    }

     // show Product filter by Brand
    public function brand($name)
    {
        $allproducts = Product::limit('7')->get();
        $categories = Category::all();
        $brand = Brand::where('brand_name','=',$name)->first();
        $products = Product::where('brand_id','=',$brand->id)->get();

        return view('product.brand',compact(['allproducts','categories','product','products','id','name']));
    }

    // Show Product by Categories
    public function categories($id, $name)
    {   
        $categories = Category::all();
        $allproducts = Product::limit('7')->get();

        $category = Category::find($id);
        if ($category == null) {
            $subcategory = Subcategory::find($id); 
            $products = Product::where('subcategory_id','=',$subcategory->id)->get();
            $category = null;  
        }else{
            $products = Product::where('category_id','=',$category->id)->get();
            $subcategory = null;
        }

       
        
        return view('product.category',compact(['subcategory','category','categories','products','allproducts']));
    }
    
    // Product Review    
    public function review(Request $request)
    {   

        // Validation
        $data = Input::all();                 
        $rules=array(
            'name' => 'required',
            'email' => 'required', 
            'message' => 'required', 
            'rating' => 'required',
            );
        $valid=Validator::make($data,$rules);
        if($valid->fails()){
            return Redirect()->back()->withErrors($valid);
        }
        
        // Review
        $review = new Review();
        $review->product_id = $request->id;
        $review->name = ucfirst($request->name);
        $review->email = $request->email;
        $review->review = $request->message;
        $review->save();

        // Rating
        $product= Product::where('id',$request->id)->first();
        $rating = new Rating;
        $rating->rating = $request->rating;
        $rating->rateable_id = $product->id;
        $product->ratings()->save($rating);


        return redirect()->back()->with('message', 'Thank you for your Review.'); 
    }
}
