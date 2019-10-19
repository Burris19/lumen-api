<?php

use Illuminate\Database\Seeder;
use App\Models\Cellar;

class WineriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cellar::class, 10)->create();
    }
}
