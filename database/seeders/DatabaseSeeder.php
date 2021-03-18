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
        $this->call([
<<<<<<< HEAD
            UserSeeder::class,
            ProvinsiSeeder::class,
            KotaSeeder::class,
            KecamatanSeeder::class
=======
            ProvinsiSeeder::class,
            KotaSeeder::class
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7
          
	       
    	]);
    }
}
