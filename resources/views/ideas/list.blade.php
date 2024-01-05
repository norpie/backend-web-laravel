@extends ('layouts.default')

@section('content')
    <style>
        ul {
            list-style: none;
        }

        .ideas {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .title {
            text-align: center;
        }

        .new-button {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 0 auto;
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
        }

        .idea-list {
            padding: 0;
        }

        .idea-item {
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .idea {
            padding: 10px;
        }

        .idea:hover {
            background-color: #f1f1f1;
        }

        .idea h2 {
            margin: 0;
        }

        .idea p {
            margin: 0;
        }

        .idea a {
            text-decoration: none;
            color: black;
        }

        .idea .bounty {
            color: #2196F3;
        }
    </style>
    <div class="ideas">
        <h1 class="title">Ideas</h1>
        <a class="new-button" href="{{ route('ideas.create') }}">
            Create Idea
        </a>
        <ul class="idea-list">
            @foreach ($ideas as $idea)
                <li class="idea-item">
                    <div class="idea">
                        <a href="{{ route('ideas.list', ['id' => $idea->id]) }}">
                            <div>
                                <h2>{{ $idea->user->username }} - {{ $idea->title }}</h2>
                                <p>{{ $idea->description }}</p>
                                <p class="bounty">€{{ $idea->bounty }}</p>
                                <p>Deadline: {{ $idea->deadline }}</p>
                            </div>
                        </a>

                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
