<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('1234'),
        ])->assignRole('Admin');
    
        User::create([
            'name' => 'Ivana',
            'email'=>'ivanalengstorff@gmail.com',
            'password'=>bcrypt('1234578'),
        ])->assignRole('Empleado');
    }
}
