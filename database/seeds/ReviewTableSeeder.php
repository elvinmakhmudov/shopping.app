<?php

use App\Shop\Models\Review;
use Illuminate\Database\Seeder;


class ReviewTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->truncate();
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\Base($faker));
        $productsCount = 50;
        $usersCount = 2;

        for ($i = 0; $i < $productsCount; $i++) {
            Review::create([
                'product_id' => $faker->numberBetween(1, $productsCount),
                'user_id' => $faker->numberBetween(1, $usersCount),
                'rating' => $faker->numberBetween(1, 5),
                'content' => $faker->paragraph(3)
            ]);
        }
    }
}
