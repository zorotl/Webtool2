<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Acer', 'Dell', 'HP', 'Philips', 'Samsung', 'Denon', 'Electrolux', 'V-Zug'];

        foreach ($brands as $b)
        {
            $brand = new Brand(
                [
                    'marke' => $b,
                ]
            );
            $brand->save();
        }
    }
}
