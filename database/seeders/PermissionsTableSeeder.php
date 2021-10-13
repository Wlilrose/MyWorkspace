<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 24,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 25,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 26,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 27,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 28,
                'title' => 'website_management_access',
            ],
            [
                'id'    => 29,
                'title' => 'server_management_access',
            ],
            [
                'id'    => 30,
                'title' => 'database_server_create',
            ],
            [
                'id'    => 31,
                'title' => 'database_server_edit',
            ],
            [
                'id'    => 32,
                'title' => 'database_server_show',
            ],
            [
                'id'    => 33,
                'title' => 'database_server_delete',
            ],
            [
                'id'    => 34,
                'title' => 'database_server_access',
            ],
            [
                'id'    => 35,
                'title' => 'web_server_create',
            ],
            [
                'id'    => 36,
                'title' => 'web_server_edit',
            ],
            [
                'id'    => 37,
                'title' => 'web_server_show',
            ],
            [
                'id'    => 38,
                'title' => 'web_server_delete',
            ],
            [
                'id'    => 39,
                'title' => 'web_server_access',
            ],
            [
                'id'    => 40,
                'title' => 'office_create',
            ],
            [
                'id'    => 41,
                'title' => 'office_edit',
            ],
            [
                'id'    => 42,
                'title' => 'office_show',
            ],
            [
                'id'    => 43,
                'title' => 'office_delete',
            ],
            [
                'id'    => 44,
                'title' => 'office_access',
            ],
            [
                'id'    => 45,
                'title' => 'technology_used_create',
            ],
            [
                'id'    => 46,
                'title' => 'technology_used_edit',
            ],
            [
                'id'    => 47,
                'title' => 'technology_used_show',
            ],
            [
                'id'    => 48,
                'title' => 'technology_used_delete',
            ],
            [
                'id'    => 49,
                'title' => 'technology_used_access',
            ],
            [
                'id'    => 50,
                'title' => 'website_create',
            ],
            [
                'id'    => 51,
                'title' => 'website_edit',
            ],
            [
                'id'    => 52,
                'title' => 'website_show',
            ],
            [
                'id'    => 53,
                'title' => 'website_delete',
            ],
            [
                'id'    => 54,
                'title' => 'website_access',
            ],
            [
                'id'    => 55,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
