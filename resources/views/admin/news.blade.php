@extends('layouts.admin')

@section('content')
    <style>
        .news {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .title {
            text-align: center;
        }

        .news img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .news form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .news form input[type='text'],
        .news form textarea {
            width: 100%;
            margin-bottom: 10px;
        }

        .news form input[type='submit'] {
            width: 100px;
            height: 30px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .news form input[type='submit']:hover {
            background-color: #45a049;
        }

        .news form button {
            width: 100px;
            height: 30px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .news form button:hover {
            background-color: #da190b;
        }

        #new-news {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #new-news form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #new-news form input[type='text'],
        #new-news form textarea {
            width: 100%;
            margin-bottom: 10px;
        }

        #new-news form input[type='submit'] {
            width: 100px;
            height: 30px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #new-news form input[type='submit']:hover {
            background-color: #45a049;
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
    <div id="news">
        <h2 class="title">News</h2>
        <hr>
        @foreach ($news as $new)
            <div class="news">
                <form method="POST" action="{{ route('admin.editnews', ['id' => $new->id]) }}" enctype="multipart/form-data"
                    class="edit">
                    @csrf
                    <label for="title">Title</label><br>
                    <input type="text" name="title" id="title" value="{{ $new->title }}"><br>
                    <label for="content">Content</label><br>
                    <textarea name="content" id="content" cols="30" rows="10">{{ $new->content }}</textarea><br>
                    {{-- Show updated if it is not equal to created at --}}
                    @if ($new->created_at != $new->updated_at)
                        <p>Updated At</p>
                        <p>{{ $new->updated_at }}</p>
                    @else
                        <p>Created At</p>
                        <p>{{ $new->created_at }}</p>
                    @endif
                    <img src="{{ asset("img/news/" . $new->image_path) }}"><br>
                    <label for="image_path">Image</label><br>
                    <input type="file" name="image" id="image_path"><br>
                    <input type="submit" value="Edit">
                </form>
                <form method="POST" action="{{ route('admin.deletenews', ['id' => $new->id]) }}" class="delete">
                    @csrf
                    <button type="submit" value="{{ $new->id }}">Delete</button>
                </form>
            </div>
            <hr>
        @endforeach
    </div>
    <div id="new-news">
        <h2 class="title">New News</h2>
        <form method="POST" action="{{ route('admin.addnews') }}" enctype="multipart/form-data" class="add">
            @csrf
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" value="{{ old('title') }}"><br>
            <label for="content">Content</label><br>
            <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea><br>
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image" value="{{ old('content') }}"><br>
            <button type="submit">Add</button>
        </form>
    </div>
@endsection
