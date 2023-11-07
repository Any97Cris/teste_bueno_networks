<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            'name' => 'admin',
            "created_at"=> Carbon::now(),
            "updated_at"=> now()
        ]);

        DB::table('permissions')->insert([
            'name' => 'common',
            "created_at"=> Carbon::now(),
            "updated_at"=> now()
        ]);
    }
}
