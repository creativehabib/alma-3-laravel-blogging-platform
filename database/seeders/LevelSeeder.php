<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create([
            'name' => 'Level 1',
            'points' => 100,
            'is_default' => true,
        ]);

        Level::create([
            'name' => 'Level 2',
            'points' => 1000,
        ]);

        Level::create([
            'name' => 'Level 3',
            'points' => 10000,
        ]);

        Level::create([
            'name' => 'Level 4',
            'points' => 50000,
        ]);

        Level::create([
            'name' => 'Level 5',
            'points' => 100000,
        ]);

        Level::create([
            'name' => 'Level 6',
            'points' => 200000,
        ]);

        Level::create([
            'name' => 'Level 7',
            'points' => 300000,
        ]);

        Level::create([
            'name' => 'Level 8',
            'points' => 500000,
        ]);

        Level::create([
            'name' => 'Level 9',
            'points' => 1000000,
        ]);
    }
}
