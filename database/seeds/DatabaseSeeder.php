<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('WineriesTableSeeder');
        $this->call('hallwaysTableSeeder');
        $this->call('ShelvesTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('CardexTableSeeder');
    }
}
