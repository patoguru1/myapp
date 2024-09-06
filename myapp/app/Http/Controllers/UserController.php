<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function login (Request $request){
     $incomingFields = $request;

     if (auth()->attempt(['name' =>$incomingFields['loginname'],'password' =>$incomingFields['loginpassword']])){

        $request->session()->regenerate();
        return redirect ('/');
     }


   
}
    public function logout (){

        auth()->logout();
        return redirect('/');
    }
    public function register(Request $request ){

        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
       // return 'hello';
       //t
       $incomingFields['password'] = bcrypt($incomingFields['password']);
     $user=User::create($incomingFields);
      auth()->login($user);
     
    }
}
