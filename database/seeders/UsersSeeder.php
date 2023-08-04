<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama'=>'Administator',
            'username'=>'admin',
            'password'=>'passwords',
            'role'=>'admin'
        ]);

        User::create([
            'nama'=>'Staf',
            'username'=>'staf',
            'password'=>'passwords',
            'role'=>'staf'
        ]);
    }
}
