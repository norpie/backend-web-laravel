@extends('layouts.default')

@section('content')
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
        }

        .article {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .article .content {
            width: 70%;
        }

        .article .content img {
            height: 500px;
        }

        .article .comments {
            width: 30%;
        }

        .article .comments form {
            display: flex;
            flex-direction: column;
        }

        .article .comments form div {
            margin-bottom: 10px;
        }

        .article .comments form div label {
            display: block;
        }

        .article .comments form div textarea {
            width: 100%;
            height: 100px;
        }

        .article .comments form div button {
            width: 100%;
        }

        .article .comments ul {
            list-style: none;
        }

        .article .comments ul li {
            margin-bottom: 10px;
        }

        .article .comments ul li:last-child {
            margin-bottom: 0;
        }
    </style>
    <div class="container">
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="article">
            <div class="content">
                <img src="{{ asset('img/news/' . $article->image_path) }}" alt="{{ $article->title }}">
                <h1>{{ $article->title }}</h1>
                <p>By {{ $writer }}</p>
                @if ($article->created_at != $article->updated_at)
                    <p>Updated on {{ $article->updated_at }}</p>
                @else
                    <p>Published on {{ $article->created_at }}</p>
                @endif
                <p>{{ $article->body }}</p>
            </div>
            <div class="comments">
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
                    @foreach ($comments as $comment)
                        <li>{{ $commentWriters[$comment->id] }}: {{ $comment->comment }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
