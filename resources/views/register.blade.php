<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>
    <div>
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf <!-- CSRF protection -->

            @error('email')
            <span>{{ $message }}</span>
            @enderror

            @error('password')
            <span>{{ $message }}</span>
            @enderror

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div>
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required>
            </div>

            <div>
                <label for"dob">Date of Birth</label>"
                <input id="dob" type="date" name="dob" value="{{ old('dob') }}" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <div>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>

            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>

</html>
