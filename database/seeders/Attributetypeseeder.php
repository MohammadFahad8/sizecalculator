<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Attributetypeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('attributetypes')->insert([


            'name'=>'chest',
            'status'=>1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),


        ]);

        DB::table('attributetypes')->insert([

        'name'=>'bottom',
        'status'=>1,
        'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),



        ]);
        DB::table('attributetypes')->insert([
        
        'name'=>'stomach',
        'status'=>1,
        'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),

    ]
);
    }
}
