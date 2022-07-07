<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Cart;
use  App\Models\Order;
use  Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    
    function index(){

    $data= Product::all();
    return view('pproduct',['products'=>$data]);

    }
    function detail($id)
    {
        //this code on line 19 gets the data from the database and displays it on the screen
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }
    function addToCart( Request $req){

        if($req->session()->has('user'))
        {
       $cart= new Cart;
       $cart->user_id=$req->session()->get('user')['id'];
       $cart->product_id=$req->product_id;
       $cart->save();
       return redirect('/');
    }
    else{
        return redirect('/login');
    }
}
//this error down is  showing but the code works perfectly!! because i imported the session up already!!
//this function down here is to count the number of items in the cart
 static function cartItem(){
    $userId = Session::get('user')['id'];
    return Cart::where ('user_id', $userId)->count();
 }
 //this function down here is to create a cart with items inside 
 //with their details while getting them from the database and displayiong them on the screen
      function cartlist(){
    $userId = Session::get('user')['id'];
    $products= DB::table('cart')
    ->join('products','cart.product_id','=','products.id')
    ->where('cart.user_id', $userId)
    ->select('products.*', 'cart.id as cart_id')
    ->get();
    return view('cartlist',['products'=>$products]);
      }
      //this function down here is to remove items from the cartlist or cart 
      function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');

      }
      //this function is to order the items you have in your cartlist!!
      function orderNow(){
        $userId = Session::get('user')['id'];
        $total= $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id', $userId)
        ->sum('products.price');
        
        return view('ordernow',['total'=>$total]);
      }
      //this function will accept data from a payment  form into database!!!
      function orderPlace(Request $req){
        
        $userId = Session::get('user')['id'];
         $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order = new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->save();
             Cart::where('user_id',$userId)->delete();

          $req->input(); 
          return redirect('/');
      }
}
//This function shows you the orders you have made and the statuses plus your address
function myOrders(){
    $userId = Session::get('user')['id'];
        $orders =   DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id', $userId)
        ->get();
        return view('myorders',['orders'=>$orders]);
}
}
