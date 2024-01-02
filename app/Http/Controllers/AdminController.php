<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\FormResponse;
use App\Models\News;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Admin;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;


class AdminController extends Controller
{

    public function showNews(): View
    {
        $news = News::all();
        return view('admin.news', [
            'news' => $news
        ]);
    }

    public function editNews(Request $request): RedirectResponse
    {
        $news_id = $request->query('id');
        $news = News::where('id', $news_id)->first();

        if ($news == null) {
            return back()->withErrors(['id' => 'News not found']);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        News::where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'updated_at' => now()
        ]);

        return redirect()->route('admin.shownews');
    }

    public function deleteNews(Request $request): RedirectResponse
    {
        News::where('id', $request->query('id'))->delete();

        return redirect()->route('admin.shownews');
    }

    public function addNews(Request $request): RedirectResponse
    {
        $user_id = Auth::id();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ]);

        $slug = Str::slug($validated['title'], '-');

        DB::table('news')->insert([
            'user_id' => $user_id,
            'title' => $validated['title'],
            'slug' => $slug,
            'image_path' => $validated['image'],
            'content' => $validated['content'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.shownews');
    }

    public function showFaqCats(): View
    {
        $faqCats = DB::table('faq_categories')->get();

        return view('admin.faq-cats', [
            'faqCats' => $faqCats
        ]);
    }

    public function addFaqCat(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('faq_categories')->insert([
            'name' => $validated['name'],
        ]);

        return redirect()->route('admin.showfaqcats');
    }

    public function deleteFaqCat(Request $request): RedirectResponse
    {
        DB::table('faq_categories')->where('id', $request->query('id'))->delete();

        return redirect()->route('admin.showfaqcats');
    }

    public function editFaqCat(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('faq_categories')->where('id', $request->query('id'))->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('admin.showfaqcats');
    }

    public function showFaqs(): View
    {
        $faqs = Faq::all();
        $categories = FaqCategory::all();

        return view('admin.faq', [
            'faqs' => $faqs,
            'categories' => $categories
        ]);
    }

    public function addFaq(): RedirectResponse
    {
        $validated = request()->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => 'required|integer|exists:faq_categories,id',
        ]);

        Faq::create([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'category_id' => $validated['category'],
        ]);

        return redirect()->route('admin.showfaqs');
    }

    public function editFaq(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => 'required|integer|exists:faq_categories,id',
        ]);

        Faq::where('id', $request->query('id'))->update([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'category_id' => $validated['category'],
        ]);

        return redirect()->route('admin.showfaqs');
    }

    public function deleteFaq(Request $request): RedirectResponse
    {
        Faq::where('id', $request->query('id'))->delete();

        return redirect()->route('admin.showfaqs');
    }

    public function showAdmins(): View
    {
        /* Admin has user_id */
        $admins = Admin::all();
        $users = User::whereIn('id', $admins->pluck('user_id'))->get();

        return view('admin.promote', [
            'admins' => $users
        ]);
    }

    public function promoteUser(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|exists:users,username',
        ]);

        $user = User::where('username', $validated['username'])->first();

        if ($user == null) {
            return back()->withErrors(['username' => 'User not found']);
        }

        $admin = Admin::where('user_id', $user->id)->first();

        if ($admin != null) {
            return back()->withErrors(['username' => 'User is already an admin']);
        }

        Admin::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.showadmins');
    }

    public function respondToContact(Request $request): RedirectResponse
    {
        $contact_id = $request->query('id');

        if ($contact_id == null) {
            return back()->withErrors(['id' => 'Contact not found']);
        }

        $contact = ContactForm::where('id', $contact_id)->first();

        $validated = $request->validate([
            'response' => 'required|string',
        ]);

        FormResponse::create([
            'contact_form_id' => $contact_id,
            'admin_id' => Auth::id(),
            'answer' => $validated['response'],
        ]);

        $sent = EmailController::sendEmail($contact->email, $validated['response']);

        if (!$sent) {
            return back()->withErrors(['email' => 'Email not sent']);
        }

        return redirect()->route('admin.showcontacts');
    }

    public function showContacts(): View
    {
        $contacts = ContactForm::whereNotIn(
            'id',
            FormResponse::all()->pluck('contact_form_id')
        )->get();

        return view('admin.contacts', [
            'contacts' => $contacts
        ]);
    }

}
