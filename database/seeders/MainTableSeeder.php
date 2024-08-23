<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profile = Profile::create([ 
            'description' => 'Super Administrador',
            'is_administrator' => true
        ]);
        $user = User::create([ 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'profile_id' => $profile->id
        ]);
    }
}
