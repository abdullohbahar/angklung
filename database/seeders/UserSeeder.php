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
        User::create([
            'username' => '21308251040',
            'password' => Hash::make('123Anggi'),
            'fullname' => './dashboard-assets/dummy-profile.jpg',
            'role' => 'teacher'
        ]);
    }
}
