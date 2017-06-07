<?php

use App\Post;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        //set the admin role to Administrator user
        $user = App\User::find(1);
        $user->roles()->attach(1);

        //creates 10 users
        factory(App\User::class, 10)->create()->each(function ($u) {

            //set role to the current user
            $u->roles()->attach(rand(1,5));

            //this creates 1 post to the current user
            factory(App\Post::class)->create(['user_id' => $u->id]);

        });
    }
}
