<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ad::create([
            'position' => 'Head Code',
            'alias' => 'head_code',
            'code' => '',
            'status' => false,
        ]);

        Ad::create([
            'position' => 'Feed Page (Top)',
            'alias' => 'feed_page_top',
            'code' => '',
            'status' => false,
        ]);

        Ad::create([
            'position' => 'Right Sidebar (Sticky)',
            'alias' => 'sidebar_sticky',
            'code' => '',
            'status' => false,
        ]);

        Ad::create([
            'position' => 'Post Page (Top)',
            'alias' => 'post_page_top',
            'code' => '',
            'status' => false,
        ]);

        Ad::create([
            'position' => 'Post Page (Before Comments)',
            'alias' => 'post_page_before_comments',
            'code' => '',
            'status' => false,
        ]);

        Ad::create([
            'position' => 'Post Page (After Comments)',
            'alias' => 'post_page_after_comments',
            'code' => '',
            'status' => false,
        ]);

        Ad::create([
            'position' => 'Static Page (Top)',
            'alias' => 'static_page_top',
            'code' => '',
            'status' => false,
        ]);

        Ad::create([
            'position' => 'Static Page (Bottom)',
            'alias' => 'static_page_bottom',
            'code' => '',
            'status' => false,
        ]);
    }
}
