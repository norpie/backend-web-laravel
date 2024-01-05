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

<div>
    <p>Username: {{ $username }}</p>
    <p>Date of birth: {{ $dob }}</p>
    <img src="{{ asset($avatar) }}" alt="Profile image">
    <p>About me: {{ $about }}</p>
</div>
@endsection
