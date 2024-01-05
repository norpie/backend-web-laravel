<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
    <form action="{{ route('forgot') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Enter your email">
        <button type="submit">Send</button>
    </form>
</body>
</html>
