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
//        $this->call(UserSeeder::class);
        $this->call(ItemConditionSeeder::class);
        $this->call(ItemTypeSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(WarehouseSeeder::class);
        $this->call(CalculatorSeeder::class);
        $this->call(\Database\Seeders\LinkSeeder::class);
    }
}
