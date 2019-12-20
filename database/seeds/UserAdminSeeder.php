<?php

use Illuminate\Database\Seeder;
use App\User;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::insert([
	        'name' => "Antonio",
	        'email' => "antonio@bobomaster.com",
	        'email_verified_at' => now(),
	        'password' => bcrypt('patata'), // password
	        'remember_token' => Str::random(10),
	        'role_id' = 2,
        ]);

    }
}
