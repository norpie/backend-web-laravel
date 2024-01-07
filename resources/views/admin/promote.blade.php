@extends('layouts.admin')

@section('content')
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title {
            margin-bottom: 20px;
        }

        .title:after {
            content: "";
            display: block;
            width: 100%;
            height: 1px;
            background-color: #000;
        }

        .alert {
            margin-top: 20px;
        }

        .alert ul {
            margin-bottom: 0;
        }

        .alert ul li {
            list-style: none;
        }

        .admins {
            margin-top: 20px;
        }

        .admins ul {
            margin-bottom: 0;
        }

        .admins ul li {
            list-style: none;
        }

        .promote {
            margin-top: 20px;
        }

        .promote form {
            display: flex;
            flex-direction: column;
        }

        .promote form label {
            margin-bottom: 10px;
        }

        .promote form input[type="text"] {
            margin-bottom: 10px;
        }

        .promote form input[type="submit"] {
            width: 100px;
            align-self: flex-end;
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
        <div class="admins">
            <h3 class="title">Admins</h3>
            <ul>
                @foreach ($admins as $admin)
                    <li>{{ $admin->username }}</li>
                @endforeach
            </ul>
        </div>
        <div class="promote form">
            <h3 class="title">Promote User</h3>
            <form method="post" action="{{ route('admin.promoteuser') }}">
                @csrf
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <input type="submit" value="Promote">
            </form>
        </div>
    </div>
@endsection
