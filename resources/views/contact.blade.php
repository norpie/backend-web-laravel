@extends('layouts.default')

@section('content')
<div>
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
