<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use  App\Models\UserData;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //Ragister functon to store user data in database
    function ragister(Request $request){
    
        $request->validate([
        'user_name'     => 'required|string|min:3|max:50',
        'user_email'  => 'required|email|unique:userdata,user_email',
        'user_password' => 'required|string|min:6',
        'user_mobile'   => 'required|digits:10|numeric',
        'user_country'  => 'required|string',
        'user_city'     => 'required|string',
         ]);


       //here we store user data
         $user=new UserData();

        $user->user_name        = $request->user_name;
        $user->user_email       = $request->user_email;
        $user->user_mobile      = $request->user_mobile;
        $user->user_country     = $request->user_country;
        $user->user_city        = $request->user_city;
        $user->user_password    = Hash::make($request->user_password); // Hash here ✅
      
        if($user->save()){
            return view('login');
        }else{
            session()->flash('error', 'Something went wrong!');
           return redirect('ragister');
        }


    }

    function login(Request $request){
        $request->validate([
            'user_email'  => 'required|email',
            'user_password'   => 'required',
        ]);

          $user = Userdata::where('user_email', $request->user_email)->first();

    if ($user && Hash::check($request->user_password, $user->user_password)) {
        // ✅ Login successful
        session(['user_email' => $user->user_email]);
        session(['user_name' =>$user->user_name]);
        session(['user_city'=>$user->user_city]);
        return redirect('/');
    } else {
        // ❌ Email not found or password incorrect
          session(['login' =>'Invalid crendentials']);
        return redirect('login');
       }
    }
}
