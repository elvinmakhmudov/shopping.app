<?php

use App\Shop\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder {

    /**
     *
     */
    public function run()
    {
        DB::table('subcategories')->truncate();
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\Base($faker));
        $subcategoriesCount = 10;
        $categoriesCount = 5;

        for($i = 0; $i < $subcategoriesCount; $i++) {
            $title = $faker->sentence(3);
            Subcategory::create([
                'title' => $title,
                'slug' => $this->seoUrl($title),
                'category_id' => $faker->numberBetween(1,$categoriesCount),
            ]);
        }
    }

    public function seoUrl($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

}