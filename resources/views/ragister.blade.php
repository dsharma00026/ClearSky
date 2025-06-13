@extends('layout.root')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
<form method="POST" action="#" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 400px;">
  @csrf
  <h3 class="text-center mb-4">Register</h3>
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label>Mobile</label>
    <input type="text" class="form-control" name="mobile">
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="mb-3">
    <label>Country</label>
    <input type="text" class="form-control" name="country">
  </div>
  <div class="mb-3">
    <label>City</label>
    <input type="text" class="form-control" name="city">
  </div>
  <button type="submit" class="btn btn-primary w-100">Register</button>
  <h6>Already have account</h6><a href="/login">Login here</a>
</form>
</div>
@endsection
