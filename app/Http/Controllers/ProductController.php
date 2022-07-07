<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Cart;
use  Session;
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
 static function cartItem(){
    $userId = Session::get('user')['id'];
    return Cart::where ('user_id', $userId)->count();
 }
}
