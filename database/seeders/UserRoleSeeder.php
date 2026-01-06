<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement(
            "INSERT INTO `user_roles` (`id`, `name`, `order`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
			(1, 'Admin', 1, NULL, NULL, NULL, '2024-05-28 01:51:29', '2024-05-28 01:51:29', NULL),
			(2, 'Super Admin', 2, NULL, NULL, NULL, '2024-05-28 01:51:29', '2024-05-28 01:51:29', NULL),
			(3, 'Guest User', 3, NULL, NULL, NULL, '2024-05-28 01:51:29', '2024-05-28 01:51:29', NULL)"
        );
    }
}
