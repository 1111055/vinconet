<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'master';
        $role_employee->description = 'Master';
        $role_employee->save();
        $role_manager = new Role();
        $role_manager->name = 'supermaster';
        $role_manager->description = 'Super Master';
        $role_manager->save();
    }
}
