<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->truncate();

        $admin = Admin::create(
            [
                'name' => 'Admin',
                'email' => 'prex-admin@admin.com',
                'password' => \Illuminate\Support\Facades\Hash::make("prexMarket"),
            ],
        );
    }
}
