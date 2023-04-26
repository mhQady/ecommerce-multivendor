<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'country_id' => 1,
            'name' => 'Mansoura',
        ]);

        City::create([
            'country_id' => 2,
            'name' => 'Ryadih',
        ]);
    }
}