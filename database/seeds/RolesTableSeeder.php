<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    private $_permissions = [
        [1, 2, 3, 4, 5],
        [1, 2, 3, 4, 5],
        [4, 5],
        [1, 3, 4, 5],
        [5],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'Manager',
        ]);

        DB::table('roles')->insert([
            'name' => 'Moderator',
        ]);

        DB::table('roles')->insert([
            'name' => 'Publisher',
        ]);

        DB::table('roles')->insert([
            'name' => 'Guest',
        ]);

        //many to many pivot table
        for ($i = 0; $i < 5; $i++)
        {
            $role = App\Role::find($i + 1);
            $role->permissions()->attach($this->_permissions[$i]);
        }
    }
}
