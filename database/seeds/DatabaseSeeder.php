<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @param string
     */
    public function info($tableName)
    {
        $this->command->info("Таблица " . $tableName . " заполненна данными!");
    }

    public function run()
    {
        $this->call(ServiceSeeder::class);
        $this->info('services');
        $this->call(StockSeeder::class);
        $this->info('stocks');
        $this->call(BlogSeeder::class);
        $this->info('blog');
        $this->call(ImageSeeder::class);
        $this->info('images');
    }
}


