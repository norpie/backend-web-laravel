@extends('layouts.default')

@section('content')
    <h1>Forgot Password</h1>
    <form action="{{ route('forgot') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Enter your email">
        <button type="submit">Send</button>
    </form>
@endsection
