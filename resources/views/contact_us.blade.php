@extends('layout.root')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="w-100" style="max-width: 600px;">
        <!-- Header -->
        <div class="p-4 rounded text-white text-center" style="background-color: rgb(49, 108, 172);">
            <h2>Contact Us</h2>
            <p class="mb-0">Have questions or feedback? We'd love to hear from you!</p>
        </div>
   <form method="POST" action="{{route('contact_us.submit')}}">
    @csrf
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
        <!-- Contact Form Card -->
        <div class="card shadow mt-4 rounded-4">
            <div class="card-body p-4">
                <form >
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control rounded-3" name="user_name" placeholder="Enter your name" value="{{old('user_name')}}" >
                        <span style="color: red;">@error('user_name'){{$message}}@enderror</span> 

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Your Email</label>
                        <input type="text" class="form-control rounded-3" name="user_email" placeholder="Enter your email" value="{{old('user_email')}}">
                        <span style="color: red;">@error('user_email'){{$message}}@enderror</span> 
 
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input type="text" class="form-control rounded-3" name="user_subject" placeholder="Subject" value="{{old('user_subject')}}">
                        <span style="color: red;">@error('user_subject'){{$message}}@enderror</span> 
    
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Your Message</label>
                        <textarea class="form-control rounded-3" name="user_message" rows="4" placeholder="Write your message..." value="{{old('user_message')}}"></textarea>
                        <span style="color: red;">@error('user_message'){{$message}}@enderror</span> 

                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-3">Send Message</button>
                </form>
            </div>
        </div>

        <!-- Optional Info -->
        <div class="text-center mt-3">
            <p>Or email us at: <strong>support@clearskyapp.com</strong></p>
        </div>
   </form>
    </div>
</div>
@endsection
