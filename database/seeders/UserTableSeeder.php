<?php



namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_employee = Role::where('name', 'master')->first();
	    $role_manager  = Role::where('name', 'supermaster')->first();
	    $employee = new User();
	    $employee->name = 'Marco Mendes';
	    $employee->email = 'marco.mendes@vincovalves.com';
	    $employee->password = bcrypt('qwerty29');
	    $employee->save();
	    $employee->roles()->attach($role_manager);
	    $employee->roles()->attach($role_employee);
	   

    }
}
