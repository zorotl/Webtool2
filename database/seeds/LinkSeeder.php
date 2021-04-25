<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Link;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $links = [
            'Google' => 'https://www.google.com/',
            'Yahoo' => 'https://search.yahoo.com/',
            'Bing' => 'https://www.bing.com/',
        ];

        $sort = range(1, 10);

        foreach ($links as $key => $value) {
            shuffle($sort);

            $link = new Link(
                [
                    'link_name' => $key,
                    'link_url' => $value,
                    'link_sort' => $sort[1],
                ]
            );
            $link->save();
        }

    }
}
