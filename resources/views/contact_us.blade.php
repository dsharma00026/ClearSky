@extends('layout.root')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="w-100" style="max-width: 600px;">
        <!-- Header -->
        <div class="p-4 rounded text-white text-center" style="background-color: rgb(49, 108, 172);">
            <h2>Contact Us</h2>
            <p class="mb-0">Have questions or feedback? We'd love to hear from you!</p>
        </div>

        <!-- Contact Form Card -->
        <div class="card shadow mt-4 rounded-4">
            <div class="card-body p-4">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control rounded-3" id="name" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control rounded-3" id="email" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control rounded-3" id="subject" placeholder="Subject" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control rounded-3" id="message" rows="4" placeholder="Write your message..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-3">Send Message</button>
                </form>
            </div>
        </div>

        <!-- Optional Info -->
        <div class="text-center mt-3">
            <p>Or email us at: <strong>support@clearskyapp.com</strong></p>
        </div>
    </div>
</div>
@endsection
