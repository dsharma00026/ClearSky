@extends('layout.root')

@section('content')
<!-- Blue background section -->
<div class="py-5 px-4 rounded text-white" style="background-color:rgb(49, 108, 172);"> <!-- Bootstrap blue -->

  <h2 class="mb-4 text-center">Welcome {{session('user_name')}}</h2>

  <!-- Form -->
  <form class="row g-3 mb-5 justify-content-center" method="post" action="{{route('city.submit')}}">
    @csrf
    <div class="col-md-5">
      <input type="text" name="user_city" class="form-control" placeholder="Enter City Name" value="{{$city_name}}">
    </div>

    <div class="col-md-2">
      <button type="submit" class="btn btn-light w-100">Check Weather</button>
    </div>
  </form>

  <div class="col-12 mt-4 text-center">
  <h6 class=" text-white mb-3">Recently Searched Cities</h6>
  <div class="d-flex justify-content-center flex-wrap gap-2">
    <!--loop for show recent city in dashboard -->
    @foreach($recentCity as $city)
    <span class="badge bg-white text-dark border border-secondary">{{$city->search_city}}</span>
    @endforeach
  </div>
</div>

</div><br><br>
<div class="py-5 px-4 rounded text-white" style="background-color:rgb(210, 208, 208);">
    <h4 class="mb-4 text-center" style="color:rgb(16, 108, 205);">Weather Information of {{$fullCityName}}</h4>
    

 
<!-- Current Weather Info: 8 Cards -->
<div class="row text-center mt-3">

  <!-- Temperature -->
  <div class="col-md-3 mb-3">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <i class="bi bi-thermometer-half fs-2 text-danger"></i>
        <h6 class="mt-2">Temperature</h6>
        <p class="mb-0">
        @if(isset($Data['current']['temp_c']))  
        {{$Data['current']['temp_c']}}
        @else "N/A"
        @endif  
      </p>
      </div>
    </div>
  </div>

  <!-- Weather Condition -->
  <div class="col-md-3 mb-3">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <i class="bi bi-cloud-sun fs-2 text-warning"></i>
        <h6 class="mt-2">Condition</h6>
        <p class="mb-0">
        @if(isset($Data['current']['condition']['text']))  
        {{$Data['current']['condition']['text']}}
        @else "N/A"
        @endif
      </p>
      </div>
    </div>
  </div>

  <!-- Humidity -->
  <div class="col-md-3 mb-3">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <i class="bi bi-droplet-fill fs-2 text-primary"></i>
        <h6 class="mt-2">Humidity</h6>
        <p class="mb-0">
          @if(isset($Data['current']['humidity']))  
        {{$Data['current']['humidity']}}
        @else "N/A"
          @endif
      </p>
      </div>
    </div>
  </div>

  <!-- Wind Speed & Direction -->
  <div class="col-md-3 mb-3">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <i class="bi bi-wind fs-2 text-info"></i>
        <h6 class="mt-2">Wind</h6>
        <p class="mb-0">
        @if(isset($Data['current']['wind_kph'])&& isset($Data['current']['wind_dir']))
         {{$Data['current']['wind_kph']."kph ".$Data['current']['wind_dir']}}
        @else "N/A" 
        @endif 
        
       </p>
      </div>
    </div>
  </div>

  <!-- Pressure -->
  <div class="col-md-3 mb-3">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <i class="bi bi-speedometer2 fs-2 text-success"></i>
        <h6 class="mt-2">Pressure</h6>
        <p class="mb-0">
        @if(isset($Data['current']['pressure_mb'] ))
         {{$Data['current']['pressure_mb']}}
        @else "N/A" 
        @endif   
       </p>
      </div>
    </div>
  </div>

  <!-- Feels Like -->
  <div class="col-md-3 mb-3">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <i class="bi bi-person-hearts fs-2 text-danger"></i>
        <h6 class="mt-2">Feels Like</h6>
        <p class="mb-0">
        @if(isset($Data['current']['feelslike_c']))
        {{$Data['current']['feelslike_c'] ?? 'N/A'}}
        @else "N/A"
        @endif   
        </p>
      </div>
    </div>
  </div>

  <!-- Visibility -->
  <div class="col-md-3 mb-3">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <i class="bi bi-eye-fill fs-2 text-secondary"></i>
        <h6 class="mt-2">Visibility</h6>
        <p class="mb-0">
        @if(isset($Data['current']['vis_km']))
        {{$Data['current']['vis_km']."km"}}
        @else "N/A" 
        @endif   
 </p>
      </div>
    </div>
  </div>

  <!-- Sunrise & Sunset -->
  <div class="col-md-3 mb-3">
    <div class="card h-100 shadow-sm">
      <div class="card-body">
        <i class="bi bi-sunrise fs-2 text-warning"></i>
        <h6 class="mt-2">Sunrise / Sunset</h6>
        <p class="mb-0">
        @if(isset($Data['forecast']['forecastday'][0]['astro']['sunrise'] )&& isset($Data['forecast']['forecastday'][0]['astro']['sunset']))
         {{$Data['forecast']['forecastday'][0]['astro']['sunrise']." / ". 
                          $Data['forecast']['forecastday'][0]['astro']['sunset']}}
        @else "N/A"
        @endif   
       </p>
      </div>
    </div>
  </div>

</div>

</div>
@endsection
