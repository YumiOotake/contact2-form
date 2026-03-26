<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['content' => '1. 商品のお届けについて'],
            ['content' => '2. 商品の交換について'],
            ['content' => '3. 商品トラブル'],
            ['content' => '4. ショップへのお問い合わせ'],
            ['content' => '5. その他'],
        ]);
    }
}
