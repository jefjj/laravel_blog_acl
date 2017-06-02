<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'create',
        ]);

        DB::table('permissions')->insert([
            'name' => 'replace',
        ]);

        DB::table('permissions')->insert([
            'name' => 'update',
        ]);

        DB::table('permissions')->insert([
            'name' => 'delete',
        ]);

        DB::table('permissions')->insert([
            'name' => 'view',
        ]);
    }
}
