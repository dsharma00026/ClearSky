@extends('layout.root')

@section('content')

 
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
<form method="POST" action="{{route('register.submit')}}" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 400px;">
  @csrf
  <h3 class="text-center mb-4">Register</h3>
    <!-- here we check flash session and show -->
   @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('failed'))
    <div class="alert alert-danger">
        {{ session('failed') }}
    </div>
@endif
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" name="user_name" value="{{old('user_name')}}">
        <span class="text-danger">@error('user_name'){{$message}}@enderror</span> 

  </div>

  <div class="mb-3">
    <label>Email</label>
    <input type="text" class="form-control" name="user_email" value="{{old('user_email')}}">
    <span class="text-danger">@error('user_email'){{$message}}@enderror</span> 

  </div>
  <div class="mb-3">
    <label>Mobile</label>
    <input type="text" class="form-control" name="user_mobile" value="{{old('user_mobile')}}">
    <span class="text-danger">@error('user_mobile'){{$message}}@enderror</span> 

  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" name="user_password">
    <span class="text-danger">@error('user_password'){{$message}}@enderror</span> 

  </div>
  <div class="mb-3">
    <label>Country</label>
    <input type="text" class="form-control" name="user_country" value="{{old('user_country')}}">
    <span class="text-danger">@error('user_country'){{$message}}@enderror</span> 
 
  </div>
  <div class="mb-3">
    <label>City</label>
    <input type="text" class="form-control" name="user_city" value="{{old('user_city')}}">
    <span class="text-danger">@error('user_city'){{$message}}@enderror</span> 

  </div>
  <button type="submit" class="btn btn-primary w-100">Register</button>
  <p class="mt-3 mt-0" >Already have an account?<a href="{{route('login.form')}}">Login here</a></p>
</form>
</div>
@endsection
