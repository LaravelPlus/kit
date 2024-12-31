<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

final class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Teams table seeded active team generated!');
        Team::factory()->count(5)->create();

        $this->command->info('Teams table seeded inactive team generated!!');
        Team::factory()->inactive()->count(5)->create();
    }
}
