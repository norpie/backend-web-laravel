<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Faq;
use App\Models\FaqCategory;

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
}
