<?php

use Illuminate\Database\Seeder;
use App\Models\Cardex;

class CardexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cardex::class, 20)->create();
    }
}
