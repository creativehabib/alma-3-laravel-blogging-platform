<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'administrator',
            'display_name' => 'Administrator',
        ]);

        Role::create([
            'name' => 'moderator',
            'display_name' => 'Moderator',
        ]);

        Role::create([
            'name' => 'editor',
            'display_name' => 'Editor',
        ]);

        Role::create([
            'name' => 'author',
            'display_name' => 'Author',
        ]);

        Role::create([
            'name' => 'user',
            'display_name' => 'User',
        ]);

        Role::create([
            'name' => 'readonly',
            'display_name' => 'User read-only',
        ]);
    }
}
