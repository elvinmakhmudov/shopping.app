<?php

use App\Shop\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        DB::table('product_subcategory')->truncate();
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\Base($faker));
        $productsCount = 15;
        $subcategoriesCount = 10;

        for($i = 0; $i < $productsCount; $i++) {
           $product = Product::create([
                'name' => $faker->sentence(6),
                'description' => $faker->paragraph(3),
                'rating' => $faker->numberBetween(1,5),
                'price' => $faker->numberBetween(1, 500),
            ]);

            $subcategoryId = $faker->numberBetween(1, $subcategoriesCount);

            $product->subcategories()->attach($subcategoryId);
        }
    }
}
