<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->delete();
        DB::table('blog')->delete();
        factory('St\Models\Image', BlogSeeder::FACTORY_COUNT )->create();
    }
}
