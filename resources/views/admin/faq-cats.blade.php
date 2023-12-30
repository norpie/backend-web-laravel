<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin News</title>
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
        <h2>Existing FAQ Categories</h2>
        <hr>
        @foreach($faqCats as $faqCat)
        <form method="POST" action="{{ route('admin.editfaqcat', ['id' => $faqCat->id]) }}">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" value="{{ $faqCat->name }}"><br>
            <button type="submit">Edit</button>
        </form>
        <form method="POST" action="{{ route('admin.deletefaqcat', ['id' => $faqCat->id]) }}">
            @csrf
            <button type="submit" value="{{ $faqCat->id }}">Delete</button>
        </form>
        <hr>
        @endforeach
    </div>
    <div>
        <h2>Add FAQ Category</h2>
        <form method="POST" action="{{ route('admin.addfaqcat') }}">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name"><br>
            <button type="submit">Add</button>
        </form>
    </div>
</body>

</html>
