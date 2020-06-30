<?php

use Illuminate\Database\Seeder;
use App\Calculator;

class CalculatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calculator = new Calculator(
            [
                'mwst' => 7.7,
                'atfaktor' => 1.1,
                'eurochf' => 1.08
            ]
        );
        $calculator->save();
    }
}
