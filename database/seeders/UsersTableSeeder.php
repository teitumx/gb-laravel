<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') -> insert($this->getData());
    }

    protected function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for($i=0; $i<10; $i++)
        {
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->password),
            ];
        }

        return $data;

    }
}
