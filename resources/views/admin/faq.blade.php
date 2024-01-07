@extends('layouts.admin')

@section('content')
    <style> <!-- Put container in center of page -->
        .container {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        .faq, .addfaq {
            width: 50%;
            margin: 0 auto;
        }

        .faq form {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .faq form button {
            width: 100px;
            margin: 10px 0;
        }

        .faq form input {
            width: 100%;
            margin: 10px 0;
        }

        .faq form select {
            width: 100%;
            margin: 10px 0;
        }

        .faq h2 {
            text-align: center;
        }

        .faq hr {
            margin: 20px 0;
        }

        .addfaq form {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .addfaq form button {
            width: 100px;
            margin: 10px 0;
        }

        .addfaq form input {
            width: 100%;
            margin: 10px 0;
        }

        .addfaq form select {
            width: 100%;
            margin: 10px 0;
        }

        .addfaq h2 {
            text-align: center;
        }

        .addfaq hr {
            margin: 20px 0;
        }

        .faq .addfaq {
            margin: 20px 0;
            border: 1px solid black;
        }

        .faq .addfaq h2 {
            margin: 0;
        }
    </style>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class='faq'>
            <h2>Existing FAQ</h2>
            <hr>
            @foreach ($faqs as $faq)
                <div class="faq">
                    <form method="POST" action="{{ route('admin.editfaq', ['id' => $faq->id]) }}">
                        @csrf
                        <label for="category">Category</label><br>
                        <select name="category" id="category">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $faq->category_id) selected @endif>
                                    {{ $category->name }}</option>
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
                </div>
                <hr>
            @endforeach
        </div>
        <div class='addfaq'>
            <h2>Add FAQ</h2>
            <form method="POST" action="{{ route('admin.addfaq') }}">
                @csrf
                <label for="category">Category</label><br>
                <select name="category" id="category">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
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
    </div>
@endsection
