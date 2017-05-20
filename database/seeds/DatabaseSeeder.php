<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServiceSeeder::class);
        $this->command->info('Таблица services заполненна данными!');
        $this->call(StockSeeder::class);
        $this->command->info('Таблица stock заполненна данными!');
    }
}

class ServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->delete();
        factory('St\Models\Service', 8)->create();
    }
}

class StockSeeder extends Seeder
{
    public function run()
    {
        DB::table('stocks')->delete();
        factory('St\Models\Stock', 2)->create();
    }
}
