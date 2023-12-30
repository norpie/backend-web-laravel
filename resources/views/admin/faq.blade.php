<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Faq</title>
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
        <h2>Existing FAQ</h2>
        <hr>
        @foreach($faqs as $faq)
        <form method="POST" action="{{ route('admin.editfaq', ['id' => $faq->id]) }}">
            @csrf
            <label for="category">Category</label><br>
            <select name="category" id="category">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $faq->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select><br>
            <label for="question">Question</label><br>
            <input type="text" name="question" id="question" value="{{ $faq->question }}"><br>
            <label for="answer">Answer</label><br>
            <input type="text" name="answer" id="answer" value="{{ $faq->answer }}"><br>
            <button type="submit">Edit</button>
        </form>
        <form method="POST" action="{{ route('admin.deletefaq', ['id' => $faq->id]) }}">
            @csrf
            <button type="submit" value="{{ $faq->id }}">Delete</button>
        </form>
        <hr>
        @endforeach
    </div>
    <div>
        <h2>Add FAQ</h2>
        <form method="POST" action="{{ route('admin.addfaq') }}">
            @csrf
            <label for="category">Category</label><br>
            <select name="category" id="category">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>
            <label for="question">Question</label><br>
            <input type="text" name="question" id="question"><br>
            <label for="answer">Answer</label><br>
            <input type="text" name="answer" id="answer"><br>
            <button type="submit">Add</button>
        </form>
    </div>
</body>

</html>
