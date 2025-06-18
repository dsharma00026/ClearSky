<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use  App\Models\UserData;
use  App\Models\Contact;
use  App\Models\RecentCity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class MainController extends Controller
{
    //Register functon here our register algorithem
    function register(Request $request){
    
        //here  we apply validation of check user input correct or not
        $request->validate([
        'user_name'     => 'required|string|min:3|max:50',
        'user_email'    => 'required|email|unique:userdata,user_email',
        'user_password' => 'required|string|min:6',
        'user_mobile'   => 'required|digits:10|numeric',
        'user_country'  => 'required|string',
        'user_city'     => 'required|string',
         ]);


       //here we store user data
         $user = new UserData();
         $user->user_name = $request->user_name;
         $user->user_email = $request->user_email;
         $user->user_mobile = $request->user_mobile;
         $user->user_country = $request->user_country;
         $user->user_city = $request->user_city;
         $user->user_password = Hash::make($request->user_password);//here we hash password for sequirty

         //here we save data in databse and move user froward to designation page with session message 
     if($user->save()){
              return redirect()->route('login.form')->with('success','Register Succesfylly! now please login');
             }else{
              return redirect()->route('register.form')->with('failed', 'Something went wrong!');
              }


    }


    //login functin here our login algorithem
    function login(Request $request){
        //here  we apply validation of check user input correct or not
        $request->validate([
            'user_email'  => 'required|email',
            'user_password'   => 'required',
        ]);

        //get user data based on email
          $user = Userdata::where('user_email', $request->user_email)->first();

          //here we check fetch data password to user enter passwrod
        if ($user && Hash::check($request->user_password, $user->user_password)) {
             // ✅ Login successful
             $request->session()->regenerate();//for prevent session attack
             //create session
             session(['user_name' =>$user->user_name]);
             session(['user_city'=>$user->user_city]);
             session(['user_id'=>$user->user_id]);
             //move dashboard page
        return redirect()->route('dashboard');
        } else {
        // ❌ Email not found or password incorrect
        return redirect()->route('login.form')->with('failed','Invalid crendentials');
        }
    }



    //fucntion for dashboard 
    function dashboard(){
        //check user login or not
        if(session('user_id')){
            return $this->fetchApiData(session('user_city'));
           //here call another method to fetch data;
            
        }else{
            //not login move login page with error message
            return redirect()->route('login.form')->with('failed', 'Please login first!');
            
        }

    }

    //function for dashboard from 
    function getCityName(Request $request){
        //here we store user search city into db
        $recent=new RecentCity();
        $recent->search_city=$request->user_city;
        $recent->user_id=session('user_id');
        $recent->save();
        //get data from dashboard from where user entered city
            return $this->fetchApiData($request->user_city);
    }


    //function for fetch data from api and show in ui
    function fetchApiData($cityName){
         $apiKey = env('WEATHER_API_KEY');//get api key 
         try {
              $url="http://api.weatherapi.com/v1/forecast.json?key=$apiKey&q=$cityName";//call api
              $fetchData=Http::get($url);
              $fetchData->body();
              $fullCityName=$cityName."[".$fetchData['location']['country']."]";//get city name and country

              //here we fetch data from db and show in dashboard in recent 
                $recentCity = RecentCity::where('user_id', session('user_id'))
                      ->orderBy('created_at', 'desc')
                      ->take(5)
                      ->get();


              //all well so call dashboard view with real data
          return view('dashboard',['Data'=>$fetchData->json(),'city_name'=>$cityName,'fullCityName'=>$fullCityName,'recentCity'=>$recentCity]);
         } catch (\Throwable $th) {
            //if get any error call dashboard ui with error handling
              return view('dashboard',['city_name'=>$cityName,'fullCityName'=>'Data not fetch maybe wrong city enterd Or something went wrong']);
         }
        
         

    }

    //logout functonality
    function logout(Request $request){
      // Remove all session data
     $request->session()->flush();

    
     // Redirect to login or home
     return redirect()->route('login.form')->with('success', 'You have been logged out.');
     }




     //here we handle contact us page
     function contact(Request $request){
         //here  we apply validation of contact from page
        $request->validate([
             'user_name' => 'required|string|min:03|max:20',
             'user_email' => 'required|email',
             'user_message'=>'required|string|min:03|max:500',//set limit of msg here
             'user_subject' => 'required|string|min:03|max:50', //  Set limit of subject here
         ]);

         //here we store user data
         $ContactUs = new Contact();
          $ContactUs->user_name = $request->user_name;
          $ContactUs->user_email = $request->user_email;
          $ContactUs->user_subject = $request->user_subject;
          $ContactUs->user_message = $request->user_message;

         //here we save data in databse and move user froward to designation page with session message 
        if($ContactUs->save()){
              return redirect()->route('contact_us.form')->with('success', 'Thank you for contacting us. We have received your message and will get back to you soon.');
             }else{
              return redirect()->route('contact_us.form')->with('failed', 'Something went wrong! Please try again after some time');
            }


     }

    
}


