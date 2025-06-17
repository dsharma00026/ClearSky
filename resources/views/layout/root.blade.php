<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ClearSky</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Header -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">ClearSky</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" style="color:white" href="{{ url('/') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" style="color:white" href="{{ url('/about') }}">About</a></li>
        <li class="nav-item"><a class="nav-link" style="color:white" href="{{ url('/terms') }}">Terms</a></li>
        <li class="nav-item"><a class="nav-link" style="color:white" href="{{ url('/contact') }}">Contact Us</a></li>
        @if(session('user_check'))
        <a href="{{ route('logout') }}" class="btn btn-danger">
        Logout
    </a>
        @endif
      </ul>
    </div>
  </div>
</nav>


 <!-- Content -->
  <main class="flex-fill">
    <div class="container my-5">
      @yield('content')
    </div>
  </main>
  
  <!-- Footer -->
  <footer class="bg-primary text-white text-center py-3 mt-auto">
    <small>© {{ date('Y') }} ClearSky. All rights reserved.</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
