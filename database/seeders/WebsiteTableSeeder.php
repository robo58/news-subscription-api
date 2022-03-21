<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('websites')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'title' => 'Test Website 1',
                    'url' => 'www.website1.test',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'title' => 'Test Website 2',
                    'url' => 'www.website2.test',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'title' => 'Test Website 3',
                    'url' => 'www.website3.test',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
        ));

    }
}
