<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHasPermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::all() as $index => $user) {
            if($index == 0) { $user->assignRole('system'); }
            if($index == 1) { $user->assignRole('admin'); }
            $user->assignRole('user');
        }
    }
}
