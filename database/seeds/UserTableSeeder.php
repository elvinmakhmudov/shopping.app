<?php

use App\Shop\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        //admin
        User::create([
            'name' => 'Elvin',
            'last_name' => 'Makhmudov',
            'email' => 'elvin@mail.ru',
            'is_admin' => true,
            'password' => bcrypt('password')
        ]);

        //dummy user
        User::create([
            'name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@mail.ru',
            'password' => bcrypt('password')
        ]);
    }

}
