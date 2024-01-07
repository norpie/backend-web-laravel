@extends('layouts.default')

@section('content')
    <style>
        .news {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .new {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #title {
            font-size: 20px;
            font-weight: bold;
        }

        #content {
            font-size: 15px;
        }

        hr {
            width: 100%;
            height: 1px;
            background-color: black;
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="news">
        <h2>News</h2>
        <hr>
        @foreach ($news as $new)
            <div class="new">
                <p id="title"><a href="{{ route('showNewsSlug', $new->slug) }}">{{ $new->title }}</a></p><br>
                <p id="content">{{ $new->content }}</p><br>
                {{-- <p>Create At</p> --}}
                {{-- <p>{{ $new->created_at }}</p> --}}
                {{-- <p>Updated At</p> --}}
                {{-- <p>{{ $new->updated_at }}</p> Show updated if not equals to created_at --}}
                @if ($new->created_at != $new->updated_at)
                    <p>Updated At: {{ $new->updated_at->format('d/m/Y H:i:s') }}</p>
                @else
                    <p>Created At: {{ $new->created_at->format('d/m/Y H:i:s') }}</p>
                @endif
                <img src="{{ asset('img/news/' . $new->image_path) }}" alt=""><br>
                <hr>
            </div>
        @endforeach
    </div>
@endsection
