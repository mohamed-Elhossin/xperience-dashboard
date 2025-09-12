<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::create([
            'name' => 'Mohamed Elhossiny',
            'email' => 'm.m.m.elhossin@gmail.com',
            'password' => bcrypt('Pa$$w0rd!'),
        ]);
    }
}
