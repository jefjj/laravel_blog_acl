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
            'name' => 'Jeferson Costa',
            'email' => 'jj.jeferson@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        factory(App\User::class, 10)->create()->each(function ($u) {
            factory(App\Post::class)->create(['user_id' => $u->id]);
        });
    }
}
