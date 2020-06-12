<?php

use App\Warehouse;
use App\StorageLocation;
use App\StoragePlace;
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
        $storageLocations = ['Lagerort 1', 'Lagerort 2', 'Lagerort 3'];
        $storagePlaces = ['Lagerplatz 1', 'Lagerplatz 2', 'Lagerplatz 3'];

        foreach ($warehouses as $w)
        {
            $warehouse = new Warehouse(
                [
                    'lager' => $w,
                ]
            );
            $warehouse->save();

            foreach ($storageLocations as $sL)
            {
                $storageLocation = new StorageLocation(
                    [
                        'warehouse_id' => $warehouse->id,
                        'lagerort' => $sL,
                    ]
                );
                $storageLocation->save();

                foreach ($storagePlaces as $sP)
                {
                    $storagePlace = new StoragePlace(
                        [
                            'storage_location_id' => $storageLocation->id,
                            'lagerplatz' => $sP,
                        ]
                    );
                    $storagePlace->save();
                }
            }
        }
    }
}
