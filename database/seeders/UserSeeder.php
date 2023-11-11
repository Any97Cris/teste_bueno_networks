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
        User::factory()
        ->count(30)
        ->create()
        ->each(function(User $user) {
            UserPermission::factory()
                ->create([
                    'user_id' => $user->id,
                    'permission_id' => 1
                ]);
            });
    }
}
