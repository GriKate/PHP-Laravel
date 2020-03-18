<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'category_id'  => $faker->numberBetween(1, 5),
                'title' => $faker->realText(rand(20, 50)),
                'text' => $faker->realText(rand(1000, 2000)),
                'isPrivate' => $faker->boolean(rand(0, 1)),
            ];
        }
        return $data;
    }
}
