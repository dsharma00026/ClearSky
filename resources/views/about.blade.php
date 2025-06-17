@extends('layout.root')

@section('content')
<div class="container mt-5">
    <div class="p-5 rounded text-white" style="background-color: rgb(49, 108, 172);">
        <h2 class="text-center mb-3">About Us</h2>
        <p class="lead text-center">Your simple and smart way to check the weather anytime, anywhere.</p>
    </div>

    <div class="row mt-5">
        <!-- Mission Card -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title text-primary">🌤 Our Mission</h4>
                    <p class="card-text">
                        ClearSky aims to deliver accurate and real-time weather updates for cities worldwide in a clean and user-friendly interface. Whether you're planning your day or your next adventure, ClearSky keeps you informed and prepared.
                    </p>
                </div>
            </div>
        </div>

        <!-- Features Card -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title text-primary">🔧 Key Features</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">✅ Easy user registration and login</li>
                        <li class="list-group-item">✅ Personalized dashboard with weather by city</li>
                        <li class="list-group-item">✅ Live temperature, humidity, wind, and more</li>
                        <li class="list-group-item">✅ Responsive design for all devices</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Developer Section -->
    <div class="card shadow mt-4 mb-5">
        <div class="card-body">
            <h4 class="card-title text-primary">👨‍💻 Developer Note</h4>
            <p class="card-text">
                This project is built using Laravel 10 and Bootstrap 5 as a part of a learning and portfolio initiative. The goal was to combine backend logic with modern UI to showcase real-time API handling and user session management.
            </p>
            <p class="mb-0">
                Developed with ❤️ by <strong>Deepak</strong>
            </p>
        </div>
    </div>
</div>
@endsection
