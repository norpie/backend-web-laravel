<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <div>
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
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
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
