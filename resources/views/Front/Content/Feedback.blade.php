@extends('Front.Master.master')

@section('content')

<body>
    <div class="page-area contact-page">
        <div class="container spad">
            <div class="text-center">
                <h4 class="contact-title">Get in Touch</h4>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            {{-- Laravel Form --}}
            <form class="contact-form" action="{{ route('feedback.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="first_name" placeholder="First Name *" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="last_name" placeholder="Last Name *" required>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="subject" placeholder="Subject">
                        <textarea name="message" placeholder="Message" required></textarea>

                        <div class="text-center">
                            <button type="submit" class="site-btn">Send Message</button>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Feedbacks Section --}}
<div class="text-center" style="margin-top: 50px;">
    <h4 class="contact-title">What Our Users Say</h4>
</div>

<div class="row">
    @foreach($feedbacks as $feedback)
    <div class="col-md-6" style="margin-bottom: 20px;">
        <div class="card" style="padding: 20px; border: 1px solid #eee; border-radius: 10px; background-color: rgb(221, 220, 220); height: 100%;">
            <h5>{{ $feedback->first_name }} {{ $feedback->last_name }}</h5>
            
            @if($feedback->subject)
                <p style="color: #333;"><strong>Subject:</strong> {{ $feedback->subject }}</p>
            @endif

            <p style="color: #333;">{{ $feedback->message }}</p>
        </div>
    </div>
    @endforeach
</div>



        </div>
    </div>
</body>
@endsection
