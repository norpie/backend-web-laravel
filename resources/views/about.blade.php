@extends('layouts.default')

@section('content')
    <h1>Github</h1>
    <p>Check out the <a href="https://github.com/norpie/backend-web-laravel">GitHub repository</a> for this website.</p>
    <h1>Sources</h1>
    <h2>Generative AI</h2>
    <ul>
        <li><a href="https://openai.com/chatgpt">ChatGPT</a></li>
        <li><a href="https://github.com/features/copilot">GitHub Copilot</a></li>
    </ul>
    <h2>Websites</h2>
    @include('partials.sources')
@endsection
