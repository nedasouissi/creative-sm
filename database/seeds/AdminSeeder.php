<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'=>'Admin' ,
                'last_name'=>'Admin',
                'email'=>'admin@admin.com',
                'role'=>'admin',
                'password'=> Hash::make('123456789')
            ]
        );
    }
}
