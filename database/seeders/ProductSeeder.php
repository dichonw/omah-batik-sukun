<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_product')->insert([
            'product_name' => 'kain Batik',
            'image' => 'asdadsad',
            'price' => 100000,
            'discount' => 1000,
            'description' => 'asdasdasdsd',
        ]);
    }
}
