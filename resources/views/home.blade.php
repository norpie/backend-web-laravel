@extends('layouts.default')

@section('content')
    <style>
        .pitch {
            background: #f5f5f5;
            padding: 50px 0;
            text-align: center;
        }

        .pitch h1 {
            font-size: 3em;
            margin-bottom: 20px;
            padding: 0 20px;
        }

        .pitch p {
            font-size: 1.5em;
            margin-bottom: 20px;
            padding: 0 20px;
        }

        .pitch a {
            font-size: 1.5em;
            text-decoration: none;
            color: #fff;
            background: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .content h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .content h3 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .content a {
            font-size: 1.2em;
            text-decoration: none;
        }

        .content a:hover {
            text-decoration: underline;
        }

        .content .container a {
            color: #007bff;
        }

        .content .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>

    <div class="content">

        <div class="pitch">
            <h1>Get paid to build software</h1>
            <p>Feature Bounty is a platform for developers to connect with idea posters.</p>
            <a href="{{ route('register') }}" class="btn btn-primary">Get started</a>
        </div>

        <div class="container">

            <h2>How it works</h2>

            <h3>For developers</h3>

            <p>Developers can browse the list of ideas and choose one they want to work on. They can then submit a proposal
                for
                how
                much they want to be paid to build it. If the idea poster accepts the proposal, the developer can start
                working
                on
                the idea. Once the developer has completed the idea, the idea poster can review the work and pay the
                developer.
            </p>

            <h3>For idea posters</h3>

            <p>Idea posters can post ideas for software they want to see built. They can then review proposals from
                developers
                who
                want to build their idea. Once they've accepted a proposal, the developer can start working on the idea.
                Once
                the
                developer has completed the idea, the idea poster can review the work and pay the developer.</p>

            <h2>How to get started</h2>

            <p>First, you'll need to <a href="{{ route('register') }}">create an account</a>. Once you've created an account,
                you
                can
                start browsing ideas and submitting proposals.</p>

            <h2>How to post an idea</h2>

            <p>Once you've created an account, you can <a href="{{ route('ideas.list') }}">post an idea</a>. You'll need to provide a title,
                description, and a bounty amount. The bounty amount is how much you're willing to pay a developer to build
                your
                idea. You'll also need to provide a deadline for when you want the idea to be completed.</p>

            <h2>How to submit a proposal</h2>

            <p>Once you've created an account, you can submit a proposal. You'll need to provide a
                description
                of
                how you plan to build the idea, and how much you want to be paid to build it. You'll also need to provide
                an
                estimated completion date.</p>

            <h2>How to accept a proposal</h2>

            <p>Once you've reiceved a proposal, you can accept the proposal. You can then hash out the
                details
                of
                the project with the developer.</p>
        </div>
    </div>
@endsection
