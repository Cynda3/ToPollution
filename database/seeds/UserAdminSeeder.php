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
            'biography' => "復讐者」. 復讐者」. 復讐者」. 第十八章 第十二章 第十五章 第十六章 第十三章 第十七章. 復讐者」. 第十二章 第十三章 第十六章.第十二章 第十一章 第十八章. 復讐者」 伯母さん .復讐者」 伯母さん. .手配書 第十七章 第十三章 第十五章 第十二章 第十一章.",
            'country' => "Japan",
	        'avatar' => "/images/p4.png",
	        'email_verified_at' => now(),
	        'password' => bcrypt('patata'), // password
	        'remember_token' => Str::random(10),
	        'role_id' => 2,
        ]);
    }
}
