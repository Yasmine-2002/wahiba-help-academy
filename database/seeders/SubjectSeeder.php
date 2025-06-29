<?php

namespace Database\Seeders;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = ['Maths', 'Physique', 'Science', 'Arabe', 'Philosophie', 'Anglais'];

        foreach ($subjects as $name) {
            Subject::create(['name' => $name]);
        }
    }
}
