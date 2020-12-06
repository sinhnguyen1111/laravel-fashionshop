<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $list = [
            [
                'name'=>'Jackets',
            ],
            [
                'name'=>'Coats',
            ],
            [
                'name'=>'T-Shirts',
            ],
            [
                'name'=>'Skirts',
            ],
        ];
        DB::table('categories')->insert($list);
    }
    
}
