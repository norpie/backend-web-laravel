@extends('layouts.default')

@section('content')
    <style>
        .idea {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .title {
            text-align: center;
        }

        .idea h1 {
            margin: 0;
        }

        .idea p {
            margin: 0;
        }

        .idea a {
            text-decoration: none;
            color: black;
        }

        .idea .publisher {
            color: #4CAF50;
        }

        .idea .deadline {
            color: #f44336;
        }

        .idea .description {
            color: #9E9E9E;
        }

        .idea .bounty {
            color: #2196F3;
        }

    </style>
    <div class="idea">
        <h1 class="title"><a class="publisher"
                href='{{ route('profile.username', ['username' => $idea->user->username]) }}'>{{ $idea->user->username }}</a>
            - {{ $idea->title }}</h1>
        <p class="description">{{ $idea->description }}</p>
        <p class="bounty">€{{ $idea->bounty }}</p>
        <p class="deadline">{{ $idea->deadline }}</p>
    </div>
@endsection
