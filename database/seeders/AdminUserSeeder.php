<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email','admin@gmail.com')->exists()) {
            User::create([
                // 'id' => Str::uuid()->toString(),
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('adminkeren123'), 
                'role' => 'admin',
                'money' => 1000000, 
                'email_verified_at' => now(),
            ]);
    }
    $this->command->info('Admin user created successfully.');
    
}
}