<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::factory(2)->create();
        $this->call(rolesSeeder::class);

        user::find(1)->roles->attach(1);
        user::find(2)->roles->attach(2);
    }
}
