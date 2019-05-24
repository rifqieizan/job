<?php

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
        // $role_employee = Role::where('name', 'employee')->first();
        // $role_manager = Role::where('name', 'manager')->first();
      
        // $employee = new User();
        // $employee->name = 'Employee Name';
        // $employee->email = 'employee@example.com';
        // $employee->password = bcrypt('secret');
        // $employee->save();
        // $employee->roles()->attach($role_employee);
        // $manager = new User();
        // $manager->name = 'Manager Name';
        // $manager->email = 'manager@example.com';
        // $manager->password = bcrypt('secret');
        // $manager->save();
        // $manager->roles()->attach($role_manager);
        
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Admin Name';
        $admin->email = 'admin@example.com';
        $admin->address='Bandung';
        $admin->birth='1993-10-10';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);
        
        $user = new User();
        $user->name = 'User Name';
        $user->email = 'user@example.com';
        $user->address='Jakarta';
        $user->birth='1993-10-10';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        

        // $role_employee=Role::where('name','employee')->first();    
        // $role_manager=Role::where('name','manager')->first();

        // $employee=new User();
        // $employee->name='Employee Name';
        // $employee->email='employee@gmail.com';
        // $employee->password=bcrypt('secret');
        // $employee->roles()->attach($role_employee);
        // $employee->save();
        

        // $manager=new User();
        // $manager->name='Manager';
        // $manager->email='manager@gmail.com';
        // $manager->password=bcrypt('secret');
        // $manager->roles()->attach($role_manager);
        // $manager->save();
    }
}
