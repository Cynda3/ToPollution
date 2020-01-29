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
	        'lastname' => "Smith",
            'email' => "antonio@bobomaster.com",
            'age' => "20",
            'biography' => "Estudiante de grado superior de desarrollo de aplicaciones web",
            'country' => "Japan",
	        'avatar' => "/images/p4.png",
	        'email_verified_at' => now(),
	        'password' => bcrypt('patata'), // password
	        'remember_token' => Str::random(10),
	        'role_id' => 2,
        ]);

        User::insert([
            'name' => "Fernando",
	        'lastname' => "Fernandez",
            'email' => "fernando@bobomaster.com",
            'age' => "10",
            'biography' => "Niño curioso",
            'country' => "China",
	        'avatar' => "/images/p4.png",
	        'email_verified_at' => now(),
	        'password' => bcrypt('patata'), // password
	        'remember_token' => Str::random(10),
	        'role_id' => 1,
        ]);
    }
}
