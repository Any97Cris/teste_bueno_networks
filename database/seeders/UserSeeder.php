<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $userId = DB::table('users')->insert([
            'name' => 'Crisciany Souza',
            'email' => 'criscianysouza1997@gmail.com',
            'password' => bcrypt('123456')
        ]);        

        

        DB::table('user_permissions')->insert([
            'user_id' => $userId,
            'permission_id' => 1,
        ]);
    }
}
