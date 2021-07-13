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
    public function run($pata)
    {
        
        // \App\Models\User::factory(10)->create();
        
        //$this->call(Attributetypeseeder::class);
        $this->call(SizechartSeeder::class,false,[$pata]);
        $this->call(BodyFeatureSeeder::class);
    }
}
