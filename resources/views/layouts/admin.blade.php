<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feature Bounty</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 1.4em;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    @include('partials.admin-header')
    <main class="container">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>
