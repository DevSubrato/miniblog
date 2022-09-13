<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'role_id' => '1',
        //     'name' => 'Mr.Admin',
        //     'email' => 'admin@blog.com',
        //     'password' => bcrypt('rootadmin')
        //    ]);
        // DB::table('users')->insert([
        //     'role_id' => '2',
        //     'name' => 'Mr.Author',
        //     'email' => 'author@blog.com',
        //     'password' => bcrypt('rootauthor')
        //    ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Tonmoy',
            'email' => 'tonmoy@blog.com',
            'password' => bcrypt('roottonmoy')
           ]);
    }
}
