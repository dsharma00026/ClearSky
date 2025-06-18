@extends('layout.root')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <form method="POST" action="{{route('login.submit')}}" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-4">Login</h3>
    @csrf
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
      <label class="form-label">Username</label>
      <input type="text" class="form-control" name="user_email" value="{{old('user_email')}}">
      <span style="color: red;">@error('user_email'){{$message}}@enderror</span> 

    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" class="form-control" name="user_password" >
       <span style="color: red;">@error('user_password'){{$message}}@enderror</span> 

    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
   <h6>Note haven't account</h6><a href="{{route('register.form')}}">Register here</a>  
  </form>
</div>
@endsection
