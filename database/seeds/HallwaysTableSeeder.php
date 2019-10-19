<?php

use Illuminate\Database\Seeder;
use App\Models\Hall;

class hallwaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hall::class, 20)->create();
    }
}
