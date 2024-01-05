<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ContactForm;
use App\Models\News;
use App\Models\Faq;
use App\Models\FaqCategory;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class InfoController extends Controller
{
    public function showHome(): View
    {
        return view('home');
    }

    public function showAbout(): View
    {
        return view('about');
    }

    public function showNew(Request $request, string $slug): View
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $comments = $news->comments()->get();
        $commentWriters = [];
        foreach ($comments as $comment) {
            $commentWriters[$comment->id] = $comment->user()->first()->username;
        }
        $writer = $news->user()->first()->username;
        return view('news-article', [
            'article' => $news,
            'comments' => $comments,
            'writer' => $writer,
            'commentWriters' => $commentWriters
        ]);
    }

    public function addNewsComment(Request $request, string $slug): RedirectResponse
    {
        $validated = $request->validate([
            'comment' => 'required'
        ]);

        $news = News::where('slug', $slug)->firstOrFail();
        Comment::create([
            'news_id' => $news->id,
            'user_id' => $request->user()->id,
            'comment' => $validated['comment']
        ]);

        return redirect()->route('showNewsSlug', ['slug' => $slug]);
    }

    public function showNews(): View
    {
        $news = News::all();
        return view('news', [
            'news' => $news
        ]);
    }

    public function showFaqs(): View
    {
        $faqs = Faq::all();
        $categories = FaqCategory::all();
        return view('faq', [
            'faqs' => $faqs,
            'categories' => $categories
        ]);
    }

    public function showContact(): View
    {
        return view('contact');
    }

    public function sendForm(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        ContactForm::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message']
        ]);

        return redirect()->route('showContact');
    }
}
