<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
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

    <div> <!--Render laravel username-->
        <p>Username: {{ $username }}</p>
        <p>Date of birth: {{ $dob }}</p>
        <img src="{{ $avatar }}" alt="Profile image">
        <p>About me: {{ $about }}</p>
    </div>
</body>

</html>
