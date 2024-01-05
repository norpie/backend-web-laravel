<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
</head>

<body>
    @include('partials/navbar')
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
        <form action="{{ route('profile.edit') }}" method="post" enctype="multipart/form-data">
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

    {{-- Change Password --}}
    <div>
        <form action="{{ route('profile.password') }}" method="post">
            @csrf
            <div>
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" id="current_password">
            </div>
            <div>
                <label for="password">New Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <div>
                <input type="submit" value="Change Password">
            </div>
        </form>
    </div>
</body>

</html>
