<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    private function getData() {
        $data = [
            '0' => [
                'name' => 'Admin',
                'email' => 'admin@news.ru',
                'password' => Hash::make('123'), //123
                ],
            '1' => [
                'name' => 'User',
                'email' => 'user@news.ru',
                'password' => Hash::make('321'), //321
                ],
        ];
        return $data;
    }
}
