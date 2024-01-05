@extends('layouts.default')

@section('content')
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf <!-- CSRF protection -->

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
    <p>Don't have an account?<a href="{{ route('register') }}">Register here.</a></p>
@endsection
