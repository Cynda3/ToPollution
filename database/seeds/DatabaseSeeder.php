<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Device;

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
        $this->call(UserAdminSeeder::class);
        //factory(User::class, 50)->create();
        //factory(Device::class, 50)->create();
        $this->call(DeviceTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(DataSeeder::class);
        $this->call(MeassurementSeeder::class);
    }
}
