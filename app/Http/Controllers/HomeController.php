<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {  
        return view('Welcome');
    }
    public function dashboard(){
        return view('dashboard.dashboard');
    }

   public function home()
    {   $products=Product::orderBy('created_at', 'DESC')->get();
      
        return view('home')->with(['products'=>$products]);
    }
    public function aboutUs()
    {   
      
        return view('layouts.aboutUs');
    }
    
}
