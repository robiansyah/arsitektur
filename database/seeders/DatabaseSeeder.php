<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'writer']);
        Role::create(['name' => 'reviewer']);
        Role::create(['name' => 'manager']);

        $admin = User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'password' => bcrypt('malang2025'),
            'email' => 'admin@gmail.com',
            'phone' => '081234567890',
        ]);
        $admin->assignRole('admin');
    }
}
