<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            '0' => [
                'category' => 'politics',
                'name' => 'Политика',
            ],
            '1' => [
                'category' => 'culture',
                'name' => 'Культура',
            ],
            '2' => [
                'category' => 'sport',
                'name' => 'Спорт',
            ],
            '3' => [
                'category' => 'economics',
                'name' => 'Экономика',
            ],
            '4' => [
                'category' => 'society',
                'name' => 'Общество',
            ]
        ];
        DB::table('categories')->insert($data);
    }

}
