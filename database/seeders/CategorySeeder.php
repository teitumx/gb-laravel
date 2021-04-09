<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories') -> insert($this->getData());
    }

    protected function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for($i=0; $i<10; $i++)
        {
            $data[] = [
                'title' => $faker->realText(20),
                'is_Visible' => $faker->boolean(80),
                'description' => $faker->realText(100)
            ];
        }

        return $data;

    }
}
