<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        product::create([
            "p_name"=>"Tomato",
            "p_mass"=>"100",
            "p_price"=>"2.50"
        ]);

        product::create([
            "p_name"=>"Potato",
            "p_mass"=>"100",
            "p_price"=>"3.50"
        ]);

        product::create([
            "p_name"=>"Cabbage",
            "p_mass"=>"100",
            "p_price"=>"4.50"
        ]);

        product::create([
            "p_name"=>"Brocoli",
            "p_mass"=>"100",
            "p_price"=>"2.50"
        ]);

        product::create([
            "p_name"=>"Eggplant",
            "p_mass"=>"100",
            "p_price"=>"5.50"
        ]);

        product::create([
            "p_name"=>"Carrot",
            "p_mass"=>"100",
            "p_price"=>"2.50"
        ]);

        product::create([
            "p_name"=>"Pumpkim",
            "p_mass"=>"100",
            "p_price"=>"5.50"
        ]);  
        
        product::create([
            "p_name"=>"Durian",
            "p_mass"=>"100",
            "p_price"=>"4.50"
        ]);  

        product::create([
            "p_name"=>"Apple",
            "p_mass"=>"100",
            "p_price"=>"1.50"
        ]);  
    }
}
