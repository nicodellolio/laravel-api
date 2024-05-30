<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'JavaScript', 'VueJS', 'Vite', 'PHP', 'MySQL', 'Laravel', 'IA', 'Machine-Learning'];

        foreach ($technologies as $technology) {
            
            $newTech = new Technology();

            $newTech->name = $technology;
            $newTech->slug = Str::slug($technology);
            $newTech->save();
        }
    }
}
