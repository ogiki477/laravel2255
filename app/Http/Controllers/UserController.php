<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
#omo this one on line 8 was also added for the hashing on this page!! so that the password is protected well
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    
    function login(Request $req){
    
    
        //for testing whether the entered data is displayed on the screen
        //return $req->input();

     $user=User::where (['email'=>$req->email])->first();
     if (!$user || !Hash::check($req->password,$user->password)){

        return "Username or password  is not matched";

     }
    else{
        $req->session()->put('user',$user);
        return redirect('/');
    }
    }
}

