<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = FaqCategory::create([
            'name' => 'Authentication',
        ]);

        $q_and_a = Faq::create([
            'question' => 'How do I change my password?',
            'answer' => 'You can change your password by navigating to your profile. In order to change your password, you must first enter your current password, then enter your new password twice. Finally, click on the "Change Password" button.',
            'category_id' => $category->id,
        ]);

        $q_and_a2 = Faq::create([
            'question' => 'How do I change my email address?',
            'answer' => 'You can change your email address by navigating to your profile. Then enter your new email address. Finally, click on the "Edit" button.',
            'category_id' => $category->id,
        ]);

        $q_and_a3 = Faq::create([
            'question' => 'How do I change my username?',
            'answer' => 'You can change your username by navigating to your profile. In order to change your username, you must first enter your current password, then enter your new username twice. Finally, click on the "Edit" button.',
            'category_id' => $category->id,
        ]);
    }
}
