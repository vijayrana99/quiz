<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id'    => '1',
            'name'  => 'Super Admin',
            'guard_name' => 'web',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);

        DB::table('roles')->insert([
            'id'    => '2',
            'name'  => 'Admin',
            'guard_name' => 'web',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);

        DB::table('roles')->insert([
            'id'    => '3',
            'name'  => 'User',
            'guard_name' => 'web',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
