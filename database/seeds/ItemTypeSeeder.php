<?php

use Illuminate\Database\Seeder;
use App\ItemType;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Fernseher' => 2,
            'Computer' => 1,
            'Monitor' => 1,
            'Festplatte' => 1,
            'Backofen' => 3,
        ];

        foreach ($types as $key => $value) {
            $type = new ItemType(
                [
                    'art' => $key,
                    'priorität' => $value
                ]
            );
            $type->save();
        }
    }
}
