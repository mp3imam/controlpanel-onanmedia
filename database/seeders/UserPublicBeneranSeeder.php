<?php

namespace Database\Seeders;

use App\Models\UserPublicModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPublicBeneranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPublicModel::factory(10)->create();
    }
}
