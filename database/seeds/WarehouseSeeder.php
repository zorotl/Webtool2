<?php

use App\Warehouse;
use App\StorageLocation;
use App\StoragePlace;
use App\Item;
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
        $brand_id = [1,2,3,4,5,6,7,8];
        $item_condition_id = [1,2,3,4];
        $item_type_id = [1,2,3,4,5,6,7,8];
        $anzahl = range(1, 20);


        foreach ($warehouses as $w) {
            $warehouse = new Warehouse([
                'lager' => $w,
            ]);
            $warehouse->save();

            foreach ($storageLocations as $sL) {
                $storageLocation = new StorageLocation([
                    'warehouse_id' => $warehouse->id,
                    'lagerort' => $sL ." - ". substr($warehouse->lager, 6),
                ]);
                $storageLocation->save();

                foreach ($storagePlaces as $sP) {
                    $storagePlace = new StoragePlace([
                        'storage_location_id' => $storageLocation->id,
                        'lagerplatz' => $sP ." - ". $storageLocation->lagerort,
                    ]);
                    $storagePlace->save();

                    for ($i = 0; $i < 3; $i++) {
                        shuffle($brand_id);
                        shuffle($item_condition_id);
                        shuffle($item_type_id);
                        shuffle($anzahl);

                        $item = new Item([
                            'storage_place_id' => $storagePlace->id,
                            'brand_id' => $brand_id['0'],
                            'item_condition_id' => $item_condition_id['0'],
                            'item_type_id' => $item_type_id['0'],
                            'anzahl' => $anzahl['0'],
                            'name' => "Beschreibung ".mt_rand(1000, 1000000),
                            'name2' => "Beschreibung ".mt_rand(1000, 1000000),
                            'beschreibung' => "Beschreibung ".mt_rand(1000, 1000000),
                            'artikel_nummer' => "Art-".mt_rand(1000, 1000000),
                            'ean' => "EAN-".mt_rand(1000000000, 2147483647)
                        ]);
                        $item->save();
                    }
                }
            }
        }
    }
}
