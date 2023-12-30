<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\News;
use App\Models\Faq;
use App\Models\FaqCategory;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class InfoController extends Controller
{

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
