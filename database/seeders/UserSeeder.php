<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
            ]
        ])->each(function ($role) {
            $role = \Spatie\Permission\Models\Role::create($role);
            User::create([
                'name' => $role->name,
                'email' => $role->name. '@test.test',
                'password' => Hash::make('password'),
            ])->assignRole($role);
        });
    }
}
