<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Pemograman Web',
            'slug' => 'pemograman-web',
            'color' => 'blue'
        ]);
         Category::create([
            'name' => 'Pemodelan Perangkat Lunak',
            'slug' => 'pemodelan-perangkat-lunak',
            'color' => 'red'
        ]);
         Category::create([
            'name' => 'Pemograman Berbasis Objek',
            'slug' => 'pemograman-berbasis-objek',
            'color' => 'green'
        ]);
         Category::create([
            'name' => 'UI UX',
            'slug' => 'ui-ux',
            'color' => 'yellow'
        ]);
         Category::create([
            'name' => 'Basis Data',
            'slug' => 'basis-data',
            'color' => 'orange'
        ]);
    }
}
