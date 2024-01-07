@extends('layouts.default')

@section('content')

    <style>
        .container {
            margin-top: 100px;
        }

        .container h2 {
            text-align: center;
        }

        .container h3 {
            text-align: center;
        }

        .container p {
            text-align: center;
        }

        .pair {
            margin: 20px;
        }

        .question {
            font-weight: bold;
        }

        .answer {
            font-style: italic;
        }

        .category {
            font-weight: bold;
            font-size: 20px;
        }

    </style>
    {{-- Separation between questions isn't clear --}}
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
        <div>
            <h2>FAQ</h2>
            @foreach ($categories as $category)
                <h3 class="category">{{ $category->name }}</h3>
                @foreach ($faqs as $faq)
                    @if ($faq->category_id == $category->id)
                        <div class="pair">
                            <p class="question">{{ $faq->question }}</p>
                            <p class="answer">{{ $faq->answer }}</p>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
