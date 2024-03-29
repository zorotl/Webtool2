<?php

use Database\Seeders\LinkSeeder;
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
//        $this->call(\Database\Seeders\UserSeeder::class);
        $this->call(ItemConditionSeeder::class);
        $this->call(ItemTypeSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(WarehouseSeeder::class);
        $this->call(CalculatorSeeder::class);
        $this->call(LinkSeeder::class);
    }
}
