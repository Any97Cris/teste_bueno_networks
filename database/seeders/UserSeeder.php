<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use App\Models\UserPermission;
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
        
        $permission = Permission::factory(2)->create();

        User::factory()
            ->count(30)
            ->hasAttached($permission)
            ->create();


    }
}
