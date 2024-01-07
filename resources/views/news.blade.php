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
        <h2>News</h2>
        <hr>
        @foreach ($news as $new)
            <p id="title"><a href="{{ route('showNewsSlug', $new->slug) }}">{{ $new->title }}</a></p><br>
            <p id="content">{{ $new->content }}</p><br>
            <p>Create At</p>
            <p>{{ $new->created_at }}</p>
            <p>Updated At</p>
            <p>{{ $new->updated_at }}</p>
            <img src="{{ asset("img/news/" . $new->image_path) }}" alt=""><br>
            <hr>
        @endforeach
    </div>
@endsection
