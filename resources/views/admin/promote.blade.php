<html>
<head>
    <title>Promote User</title>
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
        <h3>Current Admins</h3>
        <ul>
            @foreach($admins as $admin)
                <li>{{ $admin->username }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <h3>Promote Username</h3>
        <form method="post" action="{{ route('admin.promoteuser') }}">
            @csrf
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <input type="submit" value="Promote">
        </form>
    </div>
</body>
</html>
