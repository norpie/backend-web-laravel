@extends('layouts.admin')

@section('content')
    <style>
        .container {
            margin-top: 50px;
        }
        .container h2 {
            text-align: center;
        }
        .container p {
            font-size: 20px;
        }
        .container form {
            margin-top: 20px;
        }
        .container form textarea {
            width: 100%;
            padding: 10px;
            font-size: 20px;
        }
        .container form button {
            width: 100%;
            padding: 10px;
            font-size: 20px;
            margin-top: 10px;
        }
    </style>
    <div class="container">
        <h2>Answer Contacts</h2>
        @foreach ($contacts as $contact)
            <p>Name: {{ $contact->name }}</p>
            <p>Email: {{ $contact->email }}</p>
            <p>Message: {{ $contact->message }}</p>
            <form action="{{ route('admin.respondtocontact', ['id' => $contact->id]) }}" method="POST">
                @csrf
                <textarea name="response" placeholder="Your response" cols="30" rows="10"></textarea>
                <button type="submit">Respond</button>
            </form>
            <hr>
        @endforeach
    </div>
@endsection
