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
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .header {
            background: #ccc;
            padding: 20px;
        }
        .footer {
            background: #ccc;
            padding: 20px;
        }
</head>
<body>
    @include('header')
    <div class="container">
        @yield('content')
    </div>
    @include('footer')
</body>
</html>
