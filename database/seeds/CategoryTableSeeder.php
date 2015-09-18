<?php

use App\Shop\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $howMany = 10;

        //add a category for the main page
        $main = Category::create([
            'title' => 'Main page',
            'slug' => str_slug('main_page'),
            'is_main' => 1
        ]);

        $parent_ids = [];
        for ($i = 0; $i < $howMany; $i++) {
            $title = $faker->sentence(2);
            $node = Category::create([
                'title' => $title,
                'slug' => str_slug($title),
                'is_main' => 0
            ]);
//            $this->setRandomParent($node, $parent_ids, $faker);
            //use previous id as parent to speed up setting parent process
            $node->parent_id = (($node->id == 2) || ($node->id % 2 == 0)) ? null : $node->id - 1;
            $node->save();
        }

    }

    /**
     * Set a random parent for each category
     *
     * @param $node
     * @param $parent_ids
     * @param $faker
     */
    public function setRandomParent($node, &$parent_ids, $faker)
    {
        $parent_ids[] = $node->id;
        $parent_id = $faker->randomElement($parent_ids);
        $node->parent_id = ($parent_id == $node->id) ? null : $parent_id;
        $node->save();
    }

}
