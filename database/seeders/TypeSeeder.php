<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use function PHPSTORM_META\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Single Page Application', 'Database Management', 'Authentication', 'File Storage', 'E-commerce website', 'Social Network', 'Game Development', 'Mobile Applications', 'Internet of Things', 'API Deveolpment'];

        foreach ($types as $type) {
            $newType = new Type();

            $newType->name = $type;
            $newType->slug = Str::slug($newType->name, '-');
            $newType->save();

        }
    }
}
