<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        $qtd = 5;

        do
        {
            DB::table('posts')->insert([
                'title' => $faker->unique()->sentence(),
                'content' => $faker->text(1000),
                'user_id' => 1
            ]);

            $qtd--;
        }while($qtd > 0);

    }
}
