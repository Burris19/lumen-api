<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{

    protected $categories  = [
        'impresoras',
        'notebooks',
        'pc de escritorio',
        'consumibles',
        'memorias',
        'discos externos',
        'lectores de memoria',
        'monitores',
        'cables',
        'conectores',
        'otros'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
