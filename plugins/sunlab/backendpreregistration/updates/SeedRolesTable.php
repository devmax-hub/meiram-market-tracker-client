<?php namespace Rmb\Seo\Updates;

use Backend\Models\UserGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use October\Rain\Database\Updates\Seeder;
use Backend\Models\UserRole;
use SunLab\BackendPreRegistration\Plugin;
use SunLab\Limits\Models\Limit;

class SeedRolesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return string
     */
    public function run()
    {
        // Create app roles and groups
        UserRole::create([
            'name' => Lang::get('sunlab.backendpreregistration::lang.role.name'),
            'code' => Plugin::PRE_REGISTERED_ROLE_CODE,
            'description' => Lang::get('sunlab.backendpreregistration::lang.role.description'),
        ]);

        UserGroup::create([
            'name' => Lang::get('sunlab.backendpreregistration::lang.role.name'),
            'code' => 'pre-registered-members',
            'description' => Lang::get('sunlab.backendpreregistration::lang.role.description'),
            'is_new_user_default' => true
        ]);
    }
}
