<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Role};
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create([
            'nama' => 'admin'
        ]);

        $admin = User::create([
            'name' => 'Susy',
            'email' => 'susy@gmail.com',
            'password' => Hash::make('password')
        ]);

        // attach & detach
        $admin->roles()->detach($admin_role->id);
        $admin->roles()->attach($admin_role->id);
    }
}
