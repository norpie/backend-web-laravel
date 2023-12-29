<?php
namespace App\Http\Controllers;

use App\Models\News;
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

}
?>