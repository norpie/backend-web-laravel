@extends('layouts.default')

@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>{{ $article->title }}</h1>
    <p>By {{ $writer }}</p>
    @if ($article->created_at != $article->updated_at)
        <p>Updated on {{ $article->updated_at }}</p>
    @else
        <p>Published on {{ $article->created_at }}</p>
    @endif
    <p>{{ $article->body }}</p>
    <h2>Comments</h2>
    @if (Auth::check())
    <form method="POST" action="/news/{{ $article->slug }}">
        @csrf
        <div>
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment"></textarea>
        </div>
        <div>
            <button type="submit">Add Comment</button>
        </div>
    </form>
    @else
        <p>Please <a href="/login">login</a> to comment</p>
    @endif
    <ul>
        @foreach($comments as $comment)
            <li>{{ $commentWriters[$comment->id] }}: {{ $comment->comment }}</li>
        @endforeach
    </ul>
@endsection
