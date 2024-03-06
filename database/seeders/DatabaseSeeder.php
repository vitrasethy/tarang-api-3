<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SportType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Football'],
            ['name' => 'Badminton'],
            ['name' => 'Volleyball'],
            ['name' => 'Basketball'],
            ['name' => 'Ping-pong'],
        ];
        SportType::insert($data);
    }
}
