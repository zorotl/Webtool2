<?php

use App\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warehouses = ['Lager Bern', 'Lager Zürich', 'Lager St. Gallen'];

        foreach ($warehouses as $w)
        {
            $warehouse = new Warehouse(
                [
                    'lager' => $w,
                ]
            );
            $warehouse->save();
        }
    }
}
