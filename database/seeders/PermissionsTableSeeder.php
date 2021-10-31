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
                'title' => 'facility_create',
            ],
            [
                'id'    => 18,
                'title' => 'facility_edit',
            ],
            [
                'id'    => 19,
                'title' => 'facility_show',
            ],
            [
                'id'    => 20,
                'title' => 'facility_delete',
            ],
            [
                'id'    => 21,
                'title' => 'facility_access',
            ],
            [
                'id'    => 22,
                'title' => 'speciality_create',
            ],
            [
                'id'    => 23,
                'title' => 'speciality_edit',
            ],
            [
                'id'    => 24,
                'title' => 'speciality_show',
            ],
            [
                'id'    => 25,
                'title' => 'speciality_delete',
            ],
            [
                'id'    => 26,
                'title' => 'speciality_access',
            ],
            [
                'id'    => 27,
                'title' => 'setting_create',
            ],
            [
                'id'    => 28,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 29,
                'title' => 'setting_show',
            ],
            [
                'id'    => 30,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 31,
                'title' => 'setting_access',
            ],
            [
                'id'    => 32,
                'title' => 'user_detail_create',
            ],
            [
                'id'    => 33,
                'title' => 'user_detail_edit',
            ],
            [
                'id'    => 34,
                'title' => 'user_detail_show',
            ],
            [
                'id'    => 35,
                'title' => 'user_detail_delete',
            ],
            [
                'id'    => 36,
                'title' => 'user_detail_access',
            ],
            [
                'id'    => 37,
                'title' => 'job_create',
            ],
            [
                'id'    => 38,
                'title' => 'job_edit',
            ],
            [
                'id'    => 39,
                'title' => 'job_show',
            ],
            [
                'id'    => 40,
                'title' => 'job_delete',
            ],
            [
                'id'    => 41,
                'title' => 'job_access',
            ],
            [
                'id'    => 42,
                'title' => 'profile_create',
            ],
            [
                'id'    => 43,
                'title' => 'profile_edit',
            ],
            [
                'id'    => 44,
                'title' => 'profile_show',
            ],
            [
                'id'    => 45,
                'title' => 'profile_delete',
            ],
            [
                'id'    => 46,
                'title' => 'profile_access',
            ],
            [
                'id'    => 47,
                'title' => 'experience_create',
            ],
            [
                'id'    => 48,
                'title' => 'experience_edit',
            ],
            [
                'id'    => 49,
                'title' => 'experience_show',
            ],
            [
                'id'    => 50,
                'title' => 'experience_delete',
            ],
            [
                'id'    => 51,
                'title' => 'experience_access',
            ],
            [
                'id'    => 52,
                'title' => 'tracker_create',
            ],
            [
                'id'    => 53,
                'title' => 'tracker_edit',
            ],
            [
                'id'    => 54,
                'title' => 'tracker_show',
            ],
            [
                'id'    => 55,
                'title' => 'tracker_delete',
            ],
            [
                'id'    => 56,
                'title' => 'tracker_access',
            ],
            [
                'id'    => 57,
                'title' => 'notification_setting_create',
            ],
            [
                'id'    => 58,
                'title' => 'notification_setting_edit',
            ],
            [
                'id'    => 59,
                'title' => 'notification_setting_show',
            ],
            [
                'id'    => 60,
                'title' => 'notification_setting_delete',
            ],
            [
                'id'    => 61,
                'title' => 'notification_setting_access',
            ],
            [
                'id'    => 62,
                'title' => 'job_applied_create',
            ],
            [
                'id'    => 63,
                'title' => 'job_applied_edit',
            ],
            [
                'id'    => 64,
                'title' => 'job_applied_show',
            ],
            [
                'id'    => 65,
                'title' => 'job_applied_delete',
            ],
            [
                'id'    => 66,
                'title' => 'job_applied_access',
            ],
            [
                'id'    => 67,
                'title' => 'provider_type_create',
            ],
            [
                'id'    => 68,
                'title' => 'provider_type_edit',
            ],
            [
                'id'    => 69,
                'title' => 'provider_type_show',
            ],
            [
                'id'    => 70,
                'title' => 'provider_type_delete',
            ],
            [
                'id'    => 71,
                'title' => 'provider_type_access',
            ],
            [
                'id'    => 72,
                'title' => 'package_create',
            ],
            [
                'id'    => 73,
                'title' => 'package_edit',
            ],
            [
                'id'    => 74,
                'title' => 'package_show',
            ],
            [
                'id'    => 75,
                'title' => 'package_delete',
            ],
            [
                'id'    => 76,
                'title' => 'package_access',
            ],
            [
                'id'    => 77,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 78,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 79,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 80,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 81,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 82,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
