@extends('layouts.default')

@section('content')
    <h1>Generative AI</h1>
    <ul>
        <li><a href="https://openai.com/chatgpt">ChatGPT</a></li>
        <li><a href="https://github.com/features/copilot">GitHub Copilot</a></li>
    </ul>

    <h1>Websites</h1>
    @include('partials.sources')
@endsection
