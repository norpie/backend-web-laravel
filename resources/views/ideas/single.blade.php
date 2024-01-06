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

        .proposal {
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .proposal h2 {
            text-align: center;
        }

        .proposal form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .proposal textarea {
            box-sizing: border-box;
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            resize: none;
        }

        .proposal input[type=submit] {
            width: 100%;
            height: 40px;
            background-color: #2196F3;
            color: white;
            border: none;
            cursor: pointer;
        }

        .proposal input[type=submit]:hover {
            background-color: #0b7dda;
        }

        .proposal input[type=submit]:active {
            background-color: #0b7dda;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .proposal input[type=submit]:focus {
            outline: none;
        }

        .proposal input[type=submit]:disabled {
            background-color: #2196F3;
            opacity: 0.5;
            cursor: not-allowed;
        }

        .proposal input[type=submit]:disabled:hover {
            background-color: #2196F3;
        }

        .proposals {
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .accepted {
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ddd;
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

    @if ($idea->hasAcceptedProposal())
        @php
            $accepted_proposal = $idea->acceptedProposal()->first();
            $proposal = $accepted_proposal->proposal()->first();
            $proposal->user = $proposal->user()->first();
        @endphp
        <div class="proposal">
            <h2>Accepted proposal</h2>
            <h3 class="title"><a class="publisher"
                    href='{{ route('profile.username', ['username' => $proposal->user->username]) }}'>{{ $proposal->user->username }}</a>
            </h3>
            <p>{{ $proposal->description }}</p>
        </div>
    @else
        <p class="accepted">No proposal has been accepted yet</p>
    @endif

    @if (Auth::check())
        @if (Auth::user()->id == $idea->user->id)
            <div class="proposals">
                <h2>Proposals</h2>
                @foreach ($idea->proposals as $proposal)
                    <div class="proposal">
                        <h3 class="title"><a class="publisher"
                                href='{{ route('profile.username', ['username' => $proposal->user->username]) }}'>{{ $proposal->user->username }}</a>
                        </h3>
                        <p>{{ $proposal->description }}</p>
                        @if (!$idea->hasAcceptedProposal())
                            <form action="{{ route('ideas.accept') }}" method="post">
                                @csrf
                                <input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
                                <input type="submit" value="Accept">
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            @if (!$idea->hasAcceptedProposal())
                @if (!$idea->hasProposalFromUser(Auth::user()->id))
                    <div class="proposal">
                        <h2>Submit a proposal</h2>
                        <form action="{{ route('ideas.proposal') }}" method="post">
                            @csrf
                            <input type="hidden" name="idea_id" value="{{ $idea->id }}">
                            <textarea name="description" placeholder="Write here how you would solve this problem, be as detailed as possible."></textarea>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                @else
                    @php
                        $proposal = $idea->proposalFromUser(Auth::user()->id);
                    @endphp

                    <div class="proposal">
                        <h2>Your proposal</h2>
                        <h3 class="title"><a class="publisher"
                                href='{{ route('profile.username', ['username' => $proposal->user->username]) }}'>{{ $proposal->user->username }}</a>
                        </h3>
                        <p>{{ $proposal->description }}</p>
                    </div>
                @endif
            @endif
        @endif
    @endif
@endsection
