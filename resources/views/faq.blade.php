<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Faq</title>
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
        <h2>FAQ</h2>
        <hr>
        @foreach($categories as $category)
        <h3>{{ $category->name }}</h3>

        @foreach($faqs as $faq)
            @if($faq->category_id == $category->id)
                <p>{{ $faq->question }}</p>
                <p>{{ $faq->answer }}</p>
                <hr>
            @endif
        @endforeach

        @endforeach
    </div>
</body>
</html>
