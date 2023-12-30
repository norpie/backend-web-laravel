<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>News</title>
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
        <h2>News</h2>
        <hr>
        @foreach($news as $new)
            <p id="title">{{ $new->title }}"</p><br>
            <p id="content" >{{ $new->content }}</p><br>
            <p>Create At</p>
            <p>{{ $new->created_at }}</p>
            <p>Updated At</p>
            <p>{{ $new->updated_at }}</p>
            <img src="{{ asset( $new->image_path ) }}" alt=""><br>
        <hr>
        @endforeach
    </div>
</body>
</html>
