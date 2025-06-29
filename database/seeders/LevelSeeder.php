<?php

namespace Database\Seeders;
use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
     public function run(): void
    {
        $levels = ['4AM', '1AS', '2AS', '3AS'];

        foreach ($levels as $name) {
            Level::create(['name' => $name]);
        }
    }
}
