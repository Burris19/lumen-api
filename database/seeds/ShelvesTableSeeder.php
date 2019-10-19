<?php

use Illuminate\Database\Seeder;
use App\Models\Rack;

class ShelvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Rack::class, 30)->create();
    }
}
