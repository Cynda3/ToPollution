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
        $this->call(RoleTableSeeder::class);
        factory(User::class, 50)->create();
        factory(Sensor::class, 50)->create();
    }
}
