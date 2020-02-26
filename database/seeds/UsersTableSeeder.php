<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // admin
        $role_admin = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = $faker->name;
        $admin->email = $faker->safeEmail;
        $admin->password = bcrypt('secret');
        $admin->save();

        $admin->roles()->attach($role_admin);

        // user
        $role_user = Role::where('name', 'user')->first();

        $user = new User();
        $user->name = $faker->name;
        $user->email = $faker->safeEmail;
        $user->password = bcrypt('secret');
        $user->save();

        $user->roles()->attach($role_user);
    }
}
