@extends('layouts.default')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        .general {
            margin-bottom: 20px;
        }

        .general label {
            display: block;
            margin-bottom: 5px;
        }

        .general input[type="text"],
        .general textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .general input[type="submit"] {
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
            cursor: pointer;
        }

        .password {
            margin-bottom: 20px;
        }

        .password label {
            display: block;
            margin-bottom: 5px;
        }

        .password input[type="password"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .password input[type="submit"] {
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
            cursor: pointer;
        }

        .alert {
            margin-bottom: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            flex-direction: row;
            margin-left: 50px;
            margin-top: 15px;
        }

        .general, .password {
            width: 100%;
        }

        textarea {
            resize: none;
        }
    </style>

    <div class="container">
        <div class="general">
            <form action="{{ route('profile.edit') }}" method="post" enctype="multipart/form-data" class="general">
                @csrf
                <div class="general-input-box">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="{{ $username }}">
                </div>
                <div class="general-input-box">
                    <img src="{{ $avatar }}" alt="avatar" width="100px" height="100px">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <div class="general-input-box">
                    <label for="about">About me</label>
                    <textarea name="about" id="about" cols="30" rows="10">{{ $about }}</textarea>
                </div>
                <div class="general-input-box">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>

        <div class="password">
            <form action="{{ route('profile.password') }}" method="post" class="password">
                @csrf
                <div class="password">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password">
                </div>
                <div class="password">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="password">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="password">
                    <input type="submit" value="Change Password">
                </div>
            </form>
        </div>
    </div>
@endsection
