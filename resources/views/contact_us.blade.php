@extends('layout.root')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">



<form method="POST" action="#" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 400px;">
  @csrf
    <h3 class="text-center mb-4">Contact Us</h3>
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label>Your Message</label>
    <textarea class="form-control" name="message" rows="4"></textarea>
  </div>
  <button type="submit" class="btn btn-info">Submit</button>
</form>
</div>
@endsection
