<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::first();

        $news = News::create([
            'title' => 'Site is now live!',
            'user_id' => $admin->user_id,
            'content' => 'The website is now live!',
            'image_path' => '1.png',
            'slug' => 'news-title',
        ]);

        $first_comment = Comment::create([
            'user_id' => $admin->user_id,
            'news_id' => $news->id,
            'comment' => 'Enjoy reading this news!',
        ]);

        $user = User::first();

        $second_comment = Comment::create([
            'user_id' => $user->id,
            'news_id' => $news->id,
            'comment' => 'This is awesome news!',
        ]);
    }
}
