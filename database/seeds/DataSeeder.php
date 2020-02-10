<?php

use Illuminate\Database\Seeder;
use App\Data;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::insert([
	        'name' => "Dioxido Carbono",
	        'description' => "Gas"
        ]);
        Data::insert([
	        'name' => "Monoxido Carbono",
	        'description' => "Gas"
        ]);
        Data::insert([
	        'name' => "Oxigeno",
	        'description' => "Gas"
        ]);
        Data::insert([
	        'name' => "Decibelios",
	        'description' => "Ruido"
        ]);
        /*Data::insert([
	        'name' => "Bateria",
	        'description' => "Cuanta bateria queda"
        ]);*/
    }
}
