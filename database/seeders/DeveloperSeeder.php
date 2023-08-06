<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Developer;

class DeveloperSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=5; $i++){
            Developer::create([
                'name' => 'DEV'. $i,
                'hours' => 1,
                'difficulty' =>  $i,
            ]);
        }
    }
}
