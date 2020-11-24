<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        for($i=0;$i<20;$i++){
            DB::table('products')->insert([
                'name'=>'Polo&T-shirt',
                'origin_price'=>'500.000',
                'sale_price'=>'359.000',
                'category_id'=>'1',
    
            ]);
        }
    }
}
