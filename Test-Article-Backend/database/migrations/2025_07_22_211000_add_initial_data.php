<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        \Illuminate\Support\Facades\DB::table('articles')->insert([
            [
                'title' => 'first article',
                'content' => 'content for first article',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'second article',
                'content' => 'new content for second article',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'third article',
                'content' => 'this is a content for third article',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        \Illuminate\Support\Facades\DB::table('comments')->insert([
            [
                'author_name' => 'John Doe',
                'article_id' => 1,
                'content' => 'Great article!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_name' => 'Jane Smith',
                'article_id' => 1,
                'content' => 'Thanks for sharing!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_name' => 'Alex Johnson',
                'article_id' => 2,
                'content' => 'Very informative.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author_name' => 'Emily White',
                'article_id' => 3,
                'content' => 'Loved the writing style.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
