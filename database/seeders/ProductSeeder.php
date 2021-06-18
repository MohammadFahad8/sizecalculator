<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([

            'name'=>'shirt',
            'price'=>'100',
            'status'=>1
        ],
    [
        
        'name'=>'Pent',
        'price'=>'100',
        'status'=>1
    ],
[

    
    'name'=>'Levis Shirt',
    'price'=>'100',
    'status'=>1
]);
    }
}
