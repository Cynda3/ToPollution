<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Sensor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();
        factory(Sensor::class, 50)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(UserAdminSeeder::class);
    }
}
