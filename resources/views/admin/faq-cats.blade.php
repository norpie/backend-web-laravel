@extends('layouts.admin')

@section('content')
    <style>
        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin: 0 auto;
        }

        .existing, .add {
            width: 45%;
        }

        .existing form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .existing form button {
            width: 100px;
            margin-top: 10px;
        }

        .add form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .add form button {
            width: 100px;
            margin-top: 10px;
        }

        .existing h2 {
            margin-bottom: 10px;
        }

        .add h2 {
            margin-bottom: 10px;
        }

        .existing hr {
            margin-bottom: 10px;
        }

        .add hr {
            margin-bottom: 10px;
        }

        .existing label {
            margin-bottom: 10px;
        }

        .add label {
            margin-bottom: 10px;
        }

        .existing input {
            margin-bottom: 10px;
        }

        .add input {
            margin-bottom: 10px;
        }

        .existing button {
            margin-bottom: 10px;
        }

        .add button {
            margin-bottom: 10px;
        }

        .existing button:hover {
            background-color: #e6e6e6;
        }

        .add button:hover {
            background-color: #e6e6e6;
        }

        .existing button:active {
            background-color: #cccccc;
        }

        .add button:active {
            background-color: #cccccc;
        }

        .existing button:focus {
            outline: none;
        }

        .add button:focus {
            outline: none;
        }

        .existing input:focus {
            outline: none;
        }

        .add input:focus {
            outline: none;
        }

        .existing input:hover {
            background-color: #e6e6e6;
        }

        .add input:hover {
            background-color: #e6e6e6;
        }

        .existing input:active {
            background-color: #cccccc;
        }

        .add input:active {
            background-color: #cccccc;
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
        <div class="existing">
            <h2>Existing FAQ Categories</h2>
            <hr>
            @foreach ($faqCats as $faqCat)
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
        <div class="add">
            <h2>Add FAQ Category</h2>
            <form method="POST" action="{{ route('admin.addfaqcat') }}">
                @csrf
                <label for="name">Name</label><br>
                <input type="text" name="name" id="name"><br>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>
@endsection
