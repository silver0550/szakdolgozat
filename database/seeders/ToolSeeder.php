<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\Notebook;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tool::factory(20)->create([
            'owner_type' => Phone::class,
            'owner_id' => Phone::factory(),
            'user_id' => User::factory(),
        ]);

        Tool::factory(20)->create([
            'owner_type' => Notebook::class,
            'owner_id' =>Notebook::factory(),
            'user_id' => User::factory(),

        ]);
    }
}
