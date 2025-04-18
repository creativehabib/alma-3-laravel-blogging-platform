<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->createQuietly([
            'name' => 'Dart Wander',
            'username' => 'admin',
            'email' => 'admin@devklan.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('administrator')->profile()->save(Profile::factory()->make());

        User::factory()->createQuietly([
            'name' => 'Lord Moder',
            'username' => 'moder',
            'email' => 'moder@devklan.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('moderator')->profile()->save(Profile::factory()->make());

        User::factory()->createQuietly([
            'name' => 'Editor',
            'username' => 'editor',
            'email' => 'editor@devklan.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('editor')->profile()->save(Profile::factory()->make());

        User::factory(5)->create()->each(function ($user) {
            $user->profile()->save(Profile::factory()->make());
            $user->assignRole('author');
        });
    }
}
