<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
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
        <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ $username }}">
            </div>
            <div>
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <div>
                <label for="about">About me</label>
                <textarea name="about" id="about" cols="30" rows="10">{{ $about }}</textarea>
            </div>
            <div>
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
</body>

</html>
