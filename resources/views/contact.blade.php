@extends('layouts.default')

@section('content')
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background: #ccc;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <div class="container">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <h1>Contact Form</h1>
        <form action="{{ route('sendForm') }}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Your Name Please"><br>
            <input type="email" name="email" placeholder="Your Valid Email Please"><br>
            <textarea name="message" cols="30" rows="10" placeholder="Your Message Please"></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
