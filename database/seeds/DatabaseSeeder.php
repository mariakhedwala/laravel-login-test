<?php

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
        for($i=0; $i < 10; $i++) {
            $this->call(UsersTableSeeder::class);
            $this->call(JobsTableSeeder::class);
            $this->call(CitiesTableSeeder::class);
            $this->call(CountriesTableSeeder::class);
        }
    }
}
