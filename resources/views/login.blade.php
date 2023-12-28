<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Include any necessary CSS stylesheets or frameworks -->
</head>

<body>
    <div>
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf <!-- CSRF protection -->

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                <span>{{ $message }}</span>
                @enderror
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
