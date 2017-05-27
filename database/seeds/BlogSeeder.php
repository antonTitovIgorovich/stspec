<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    // look at ImageSeeder
    const FACTORY_COUNT = 5;

    public function run()
    {
        factory('St\Models\Blog', self::FACTORY_COUNT)->create();
    }
}
