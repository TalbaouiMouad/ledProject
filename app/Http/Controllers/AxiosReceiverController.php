<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AxiosReceiverController extends Controller
{
    public function ReceiveIt(Request $request){
        
        // $product=Product::find($request->id);
        // dd('hello');
        
        // return redirect()->route('show.aboutus');
        // return view('layouts.accueil')->with('id',$request);
    //     dd($id);
    //     $validator= Validator::make($request->all(),[
    //         'id' => 'required',
    //     ]);
      
    //     if ($validator->fails()) {
    //         return redirect()->route('home')
    //             ->withInput()
    //             ->withErrors($validator);
    //     }
       
    //     $item=new ShoppingCart();

    //     $item->save();
 
}
function accueil(){
    return view('layouts.accueil');
}
}

