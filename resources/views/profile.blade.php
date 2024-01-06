@extends('layouts.default')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    .profile {
        width: 50%;
        margin: 0 auto;
        text-align: center;
    }

    .profile img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }

    .profile .username {
        font-size: 20px;
        font-weight: bold;
    }

    .profile .dob {
        font-size: 20px;
        font-weight: bold;
    }

    .profile .about {
        font-size: 20px;
        font-weight: bold;
    }
</style>

<div class='profile'>
    <p class="username">Username: {{ $username }}</p>
    <p class"dob">Date of birth: {{ $dob }}</p>
    <img src="{{ asset($avatar) }}" alt="Profile image">
    <p class="about">About: {{ $about }}</p>
</div>
@endsection
