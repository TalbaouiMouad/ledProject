<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
   public function index(){
      $products=Product::orderBy('created_at', 'DESC')->get();
    return view('dashboard.product')->with(['products'=>$products]);
   }
   public function showAddProduct(){
      return view('dashboard.addProduct');
   }
   
   public function addProduct(Request $request)
   {
      $validator= Validator::make($request->all(),[
           'product_name'=>'required|max:20',
           'long_description',
           'photo'=>'mimes:jpeg,png,jpg,gif',
           'small_description'=>'required',
           'product_price'=>'required',
           'product_amount'=>'required',
           'product_publish'
       ]);
       if ($request->hasFile('photo')) {
         $path = 'storage/'.$request->file('photo')->store('public/img','public');
      }else{
          $path = null;
      }
       if ($validator->fails()) {
           return redirect()->route('productform')
               ->withInput()
               ->withErrors($validator);
       }
       
       $product=new Product();
       $product->product_name=$request->product_name;
       $product->long_description=$request->long_description;
       $product->small_description=$request->small_description;
       $product->photo=$path;
       $product->product_price=$request->product_price;
       $product->product_amount=$request->product_amount;
       $product->product_publish=$request->product_publish;
       $product->save();
       
       return redirect()->route('dashboard.productList')->with(['status'=> 'Product added successfully!']);
   }
   public function showUpdateProduct($id){
      $product=Product::find($id);
      return view('dashboard.updateProduct')->with('product',$product);
   }
   public function updateProduct(Request $request)
   {    $id=$request->input('product_id');
      
       $product = Product::find($id);
       $request->validate([
         'product_name'=>'required|max:20',
         'long_description',
         'photo'=>'mimes:jpeg,png,jpg,gif',
         'small_description'=>'required',
         'product_price'=>'required',
         'product_amount'=>'required',
         'product_publish'
       ]);

       if ($request->hasFile('photo')) {
          $path = 'storage/'.$request->file('photo')->store('public/img','public');
       }else{
           $path = null;
       }
       
       $product->product_name=$request->product_name;
       $product->long_description=$request->long_description;
       $product->small_description=$request->small_description;
       $product->photo=$path;
       $product->product_price=$request->product_price;
       $product->product_amount=$request->product_amount;
       $product->product_publish=$request->product_publish;
    
       $product->save();
       
       return redirect()->route('dashboard.productList')
       ->with(['status'=>'product updated successfully']);
   }
   public function destroy($id)
   {
       
       Product::destroy($id);
       return redirect()->route('dashboard.productList')
       ->with(['status'=>'product deleted successfully']);

   }
   public function search(Request $request){
    $keyword=  $request->search;
   
    if (Product::where('product_name','=',$keyword)) {
        $products= Product::where('product_name','=',$keyword)->get();
    return view('home')->with('products', $products);
    }
   return redirect()->route('home')->with('status','No Result');
}
}
