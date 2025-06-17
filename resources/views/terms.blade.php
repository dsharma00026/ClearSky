@extends('layout.root')

@section('content')
<div class="container mt-5 mb-5">
    <!-- Header Section -->
    <div class="p-5 rounded text-white" style="background-color: rgb(49, 108, 172);">
        <h2 class="text-center mb-3">Terms & Conditions</h2>
        <p class="lead text-center">Please read these terms and conditions carefully before using ClearSky.</p>
    </div>

    <!-- Terms Content -->
    <div class="card shadow mt-4">
        <div class="card-body">
            <h4 class="text-primary">1. Acceptance of Terms</h4>
            <p>By accessing or using ClearSky, you agree to be bound by these terms. If you do not agree with any part of the terms, you may not access the service.</p>

            <h4 class="text-primary mt-4">2. Usage of Service</h4>
            <p>ClearSky is a weather forecast platform for personal use. You may not use the service for any illegal or unauthorized purposes. Misuse of the system may result in termination of access.</p>

            <h4 class="text-primary mt-4">3. User Data</h4>
            <p>We collect basic user data such as name, email, and city for personalization. Your information is stored securely and not shared with third parties without your consent.</p>

            <h4 class="text-primary mt-4">4. API Limitations</h4>
            <p>Weather data is sourced from a third-party API. We do not guarantee 100% accuracy of the information provided, and some cities may return unexpected results due to limitations in the API.</p>

            <h4 class="text-primary mt-4">5. Changes to Terms</h4>
            <p>We reserve the right to update or modify these terms at any time. Continued use of the service after changes implies your acceptance of the new terms.</p>

            <h4 class="text-primary mt-4">6. Contact</h4>
            <p>If you have any questions about these terms, feel free to contact the developer.</p>

            <p class="mt-4 mb-0"><strong>Last Updated:</strong> June 2025</p>
        </div>
    </div>
</div>
@endsection
