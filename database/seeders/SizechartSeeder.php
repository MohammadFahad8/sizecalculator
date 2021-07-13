<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizechartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($name)
    {
        dd($name);
        //
        DB::table('sizecharts')->insert([
            'height_start'=>'160',  'height_end'=>'172',  'weight_start'=>'120',  'weight_end'=>'145',
        ]);
        DB::table('sizecharts')->insert([
            'height_start'=>'163',  'height_end'=>'175',  'weight_start'=>'135',  'weight_end'=>'160',
        ]);
        DB::table('sizecharts')->insert([
            'height_start'=>'165',  'height_end'=>'178',  'weight_start'=>'150',  'weight_end'=>'180',
        ]);
        DB::table('sizecharts')->insert([
            'height_start'=>'170',  'height_end'=>'182',  'weight_start'=>'170',  'weight_end'=>'200',
        ]);
        DB::table('sizecharts')->insert([
            'height_start'=>'172',  'height_end'=>'188',  'weight_start'=>'190',  'weight_end'=>'220',
        ]); 
         DB::table('sizecharts')->insert([
            'height_start'=>'175',  'height_end'=>'193',  'weight_start'=>'210',  'weight_end'=>'240',
        ]);
        





    }
}
