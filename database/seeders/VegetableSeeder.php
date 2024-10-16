<?php

namespace Database\Seeders;

use App\Models\Vegetable;
use Illuminate\Database\Seeder;

class VegetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vegetable::factory(100)->create();
    }
}
