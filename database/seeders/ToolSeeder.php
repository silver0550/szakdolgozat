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
    public function run(): void
    {
        $this->call([
            PhoneSeeder::class,
            NotebookSeeder::class,
            DisplaySeeder::class,
            PrinterSeeder::class,
            SimCardSeeder::class,
            TabletSeeder::class,
            WorkStationSeeder::class,
        ]);

    }
}
