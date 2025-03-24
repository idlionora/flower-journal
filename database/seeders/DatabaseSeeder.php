<?php

namespace Database\Seeders;

use App\Models\Classification;
use App\Models\Flower;
use App\Models\FlowerTab;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Nurul Azizah',
            'email' => 'nuruaizaa_pmrfi@mailsac.com'
        ]);

        Flower::factory(20)->create([
            'user_id' => 1
        ]);

        $flowers = Flower::all();

        foreach ($flowers as $flower) {
            for ($i = 0; $i < count(Classification::$taxonomy); $i++)
            {
                Classification::factory()->create([
                    'label' => Classification::$taxonomy[$i],
                    'flower_id' => $flower->id,
                    'user_id' => 1
                ]);
            }
        }

        foreach ($flowers as $flower) {
            FlowerTab::factory()->create([
                'label' => 'Main',
                'flower_id' => $flower->id,
                'user_id' => 1
            ]);

            $tabNumber = mt_rand(1, 3);

            for ($i = 0; $i < $tabNumber; $i++)
            {
                FlowerTab::factory()->create([
                    'label' => fake()->country(),
                    'flower_id' => $flower->id,
                    'user_id' => 1
                ]);
            }
        }

        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
