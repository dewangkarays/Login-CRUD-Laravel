<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataMagangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftar_magangs')-> insert (
            [
            'nama'=> 'Dewangkara Yoga Setyawan',
            'email'=> 'dewangkarayoga05@gmail.com',
            'semester'=> '4',
            'universitas'=> 'Universitas Diponegoro'
             ]
            
    
        );
    }
}
