<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();
        $role_admin  = Role::where('name', 'admin')->first();
    $role_recruteur  = Role::where('name', 'recruteur')->first();
     $role_user  = Role::where('name', 'user')->first();
    
        $admin = new User();
         $admin->name = 'admin';
         $admin->email = 'admin@mail.com';
        $admin->password = bcrypt('admin123');
        $admin->save();
         $admin->roles()->attach($roles);
    
    
         $recruteur = new User();
         $recruteur->name = 'recruteur';
         $recruteur->email = 'eventmanager@mail.com';
         $recruteur->password = bcrypt('manager123');
         $recruteur->save();
        $recruteur->roles()->attach($role_recruteur);
      $recruteur->roles()->attach($role_user);
    
       
    
        
        $user = new User();
        $user->name = 'user';
        $user->email = 'user@mail.com';
       $user->password = bcrypt('user123');
   $user->save();
       $user->roles()->attach($role_user);

     }
}
