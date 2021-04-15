<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news') -> insert($this->getData());
    }

    protected function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for($i=0; $i<10; $i++)
        {
            $title = $faker->sentence(rand(3, 6));
            $slug = \Illuminate\Support\Str::slug($title);

            $data[] = [
                'title' => $title,
                'slug' => $slug,
                'category_id' => $faker->numberBetween(1, 10),
                'newstext' => $faker->realText(100),
                'author' => $faker->firstName
            ];
        }

        return $data;

    }
}
