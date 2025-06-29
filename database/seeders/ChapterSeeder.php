<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;
class ChapterSeeder extends Seeder
{
   public function run(): void
    {
        $chapters = [
            ['number' => 1, 'title' => 'Introduction aux bases'],
            ['number' => 2, 'title' => 'Les équations'],
            ['number' => 3, 'title' => 'La matière et l’énergie'],
            ['number' => 4, 'title' => 'Les fonctions'],
        ];

        foreach ($chapters as $chapter) {
            Chapter::create($chapter);
        }
    }
}
