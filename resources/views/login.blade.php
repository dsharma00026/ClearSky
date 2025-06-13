@extends('layout.root')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <form method="POST" action="#" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-4">Login</h3>
    @csrf
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" class="form-control" name="username" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" class="form-control" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
   <h6>Note haven't account</h6><a href="/ragister">Ragister here</a>  
  </form>
</div>
@endsection
