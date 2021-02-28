<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $admin = \App\Models\Role::create([
             'name'=> 'admin',
           
         ]);


         $recruteur = \App\Models\Role::create([
             'name'=> 'recruteur',
           

        ]);
         $user = \App\Models\Role::create([
             'name'=> 'user',
           

        ]);

        }
}
