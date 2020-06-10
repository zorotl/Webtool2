<?php

use Illuminate\Database\Seeder;
use App\ItemCondition;

class ItemConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = ['Neu und OVP', 'Neuwertig', 'Gebraucht', 'Beschädigt'];

        foreach ($conditions as $c)
        {
            $condition = new ItemCondition(
                [
                    'zustand' => $c,
                ]
            );
            $condition->save();
        }
    }
}
