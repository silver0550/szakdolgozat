<?php

namespace Database\Seeders;

use App\Models\Tablet;
use Illuminate\Database\Seeder;

class TabletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Tablet::factory(10)->create();
    }
}
