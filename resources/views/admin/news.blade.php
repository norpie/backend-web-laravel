<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin News</title>
</head>

<body>
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
        <h2>Existing News</h2>
        <hr>
        @foreach($news as $new)
            <form method="POST" action="{{ route('admin.editnews', ['id' => $new->id]) }}" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" value="{{ $new->title }}"><br>
            <label for="content">Content</label><br>
            <textarea name="content" id="content" cols="30" rows="10">{{ $new->content }}</textarea><br>
            <p>Create At</p>
            <p>{{ $new->created_at }}</p>
            <p>Updated At</p>
            <p>{{ $new->updated_at }}</p>
            <img src="{{ asset( $new->image_path ) }}" alt=""><br>
            <label for="image_path">Image</label><br>
            <input type="file" name="image" id="image_path"><br>
            <input type="submit" value="Edit">
        </form>
        <form method="POST" action="{{ route('admin.deletenews', ['id' => $new->id]) }}">
            @csrf
            <button type="submit" value="{{ $new->id }}">Delete</button>
        </form>
        <hr>
        @endforeach
    </div>
    <div>
        <h2>Add News</h2>
        <form method="POST" action="{{ route('admin.addnews') }}" enctype="multipart/form-data">
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
</body>

</html>
