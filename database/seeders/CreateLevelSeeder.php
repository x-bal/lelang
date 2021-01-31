<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class CreateLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Level::create([
            'level' => 'admin',
        ]);
    }
}
