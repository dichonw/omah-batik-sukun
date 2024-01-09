<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_article')->insert([
            'article-title' => 'kain Batik',
            'image' => 'asdadsad',
            'description' => 'asdadsad',
            'optional_link' => 'asdadsad',
        ]);
    }
}