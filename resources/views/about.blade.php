@extends('layouts.default')

@section('content')
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .container h1 {
            font-size: 2rem;
            margin-top: 2rem;
        }

        .container h2 {
            font-size: 1.5rem;
            margin-top: 1.5rem;
        }

        .container p {
            font-size: 1.2rem;
            margin-top: 1.2rem;
        }

        .container ul {
            font-size: 1.2rem;
            margin-top: 1.2rem;
        }

        .container li {
            margin-top: 0.5rem;
        }
    </style>
    <div class="container">
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
    </div>
@endsection
