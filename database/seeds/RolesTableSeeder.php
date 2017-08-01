<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['student', 'teacher', 'admin', 'superadmin'];

        foreach ($roles as $role) 
        {
           factory(App\Role::class)->create([
                'name' => $role
            ]);
        }
    }
}
