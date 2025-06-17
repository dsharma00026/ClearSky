<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use  App\Models\UserData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class MainController extends Controller
{
    //Ragister functon to store user data in database
    function register(Request $request){
    
        $request->validate([
        'user_name'     => 'required|string|min:3|max:50',
        'user_email'  => 'required|email|unique:userdata,user_email',
        'user_password' => 'required|string|min:6',
        'user_mobile'   => 'required|digits:10|numeric',
        'user_country'  => 'required|string',
        'user_city'     => 'required|string',
         ]);


       //here we store user data
       $user = new UserData([
        'user_name'     => $request->user_name,
        'user_email'    => $request->user_email,
        'user_mobile'   => $request->user_mobile,
        'user_country'  => $request->user_country,
        'user_city'     => $request->user_city,
        'user_password' => Hash::make($request->user_password),
         ]);
      
     if($user->save()){
              return redirect()->route('login.form')->with('status','Register Succesfylly! now please login');
             }else{
              return redirect()->route('register.form')->with('status', 'Something went wrong!');
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
             $request->session()->regenerate();
             session(['user_email' => $user->user_email]);
             session(['user_name' =>$user->user_name]);
             session(['user_city'=>$user->user_city]);
             session(['user_check'=>1]);
        return redirect()->route('dashboard');
        } else {
        // ❌ Email not found or password incorrect
        return redirect()->route('login.form')->with('status','Invalid crendentials');
        }
    }







    function dashboard(){
        if(session('user_check')){
            return $this->fetchApiData(session('user_city'));
           //here call another method to fetch data;
            
        }else{
            return redirect()->route('login.form')->with('status', 'Please login first!');
            
        }

    }

    function getCityName(Request $request){
            return $this->fetchApiData($request->user_city);
    }


    function fetchApiData($cityName){
         $apiKey = env('WEATHER_API_KEY');
         try {
              $url="http://api.weatherapi.com/v1//forecast.json?key=$apiKey&q=$cityName";
              $fetchData=Http::get($url);
              $fetchData->body();
              $fullCityName=$cityName."[".$fetchData['location']['country']."]";
          return view('dashboard',['Data'=>$fetchData->json(),'city_name'=>$cityName,'fullCityName'=>$fullCityName]);
         } catch (\Throwable $th) {
              return view('dashboard',['city_name'=>$cityName,'fullCityName'=>'Data not fetch maybe wrong city enterd Or something went wrong']);
         }
        
         

    }

    function logout(Request $request){
      // Remove all session data
     $request->session()->flush();

    
     // Redirect to login or home
     return redirect()->route('login.form')->with('status', 'You have been logged out.');
     }

    
}
