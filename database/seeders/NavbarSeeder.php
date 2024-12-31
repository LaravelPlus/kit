<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Top-level navigation items
        $playgroundId = DB::table('navbar')->insertGetId([
            'title' => 'Playground',
            'url' => '#',
            'icon' => 'SquareTerminal', // Store icon names as strings
            'is_active' => true,
            'parent_id' => null,
            'order' => 1,
        ]);

        $modelsId = DB::table('navbar')->insertGetId([
            'title' => 'Models',
            'url' => '#',
            'icon' => 'Bot',
            'is_active' => true,
            'parent_id' => null,
            'order' => 2,
        ]);

        $documentationId = DB::table('navbar')->insertGetId([
            'title' => 'Documentation',
            'url' => '#',
            'icon' => 'book-open',
            'is_active' => true,
            'parent_id' => null,
            'order' => 3,
        ]);

        $settingsId = DB::table('navbar')->insertGetId([
            'title' => 'Settings',
            'url' => '#',
            'icon' => 'settings2',
            'is_active' => true,
            'parent_id' => null,
            'order' => 4,
        ]);

        // Child navigation items for Playground
        DB::table('navbar')->insert([
            ['title' => 'History', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $playgroundId, 'order' => 1],
            ['title' => 'Starred', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $playgroundId, 'order' => 2],
            ['title' => 'Settings', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $playgroundId, 'order' => 3],
        ]);

        // Child navigation items for Models
        DB::table('navbar')->insert([
            ['title' => 'Genesis', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $modelsId, 'order' => 1],
            ['title' => 'Explorer', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $modelsId, 'order' => 2],
            ['title' => 'Quantum', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $modelsId, 'order' => 3],
        ]);

        // Child navigation items for Documentation
        DB::table('navbar')->insert([
            ['title' => 'Introduction', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $documentationId, 'order' => 1],
            ['title' => 'Get Started', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $documentationId, 'order' => 2],
            ['title' => 'Tutorials', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $documentationId, 'order' => 3],
            ['title' => 'Changelog', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $documentationId, 'order' => 4],
        ]);

        // Child navigation items for Settings
        DB::table('navbar')->insert([
            ['title' => 'General', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $settingsId, 'order' => 1],
            ['title' => 'Team', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $settingsId, 'order' => 2],
            ['title' => 'Billing', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $settingsId, 'order' => 3],
            ['title' => 'Limits', 'url' => '#', 'icon' => null, 'is_active' => true, 'parent_id' => $settingsId, 'order' => 4],
        ]);
    }
}
