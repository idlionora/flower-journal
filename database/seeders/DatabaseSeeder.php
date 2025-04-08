<?php

namespace Database\Seeders;

use App\Models\Classification;
use App\Models\Flower;
use App\Models\FlowerTab;
use App\Models\Photo;
use App\Models\Synonym;
use App\Models\Tag;
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
        $numOfFlowers = count($flowers);

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

        foreach ($flowers as $flower) {
            Synonym::factory(rand(3, 5))->create([
                'flower_id'=> $flower->id
            ]);
        }

        $numPhotoPerFlower = 6;
        $numOfSharedPhotos = 1;

        Photo::factory($numOfFlowers * ($numPhotoPerFlower-$numOfSharedPhotos))->create();

        $photos = Photo::all()->shuffle();
        $allPhotoIds = [];

        foreach ($photos as $photo) {
            array_push($allPhotoIds, $photo->id);
        }

        $remainingPhotoIds = $allPhotoIds;

        foreach ($flowers as $flower) {
            $flowerPhotos = [];
            $flowerPhotosUnpicked = [];
            $sharedFlowerPhotos = [];

            for ($i = 0; $i < $numPhotoPerFlower - $numOfSharedPhotos; $i++) {
                array_push($flowerPhotos, array_pop($remainingPhotoIds));
            }

            $flowerPhotosUnpicked = array_diff($allPhotoIds, $flowerPhotos);
            shuffle($flowerPhotosUnpicked);

            for ($i = 0; $i < $numOfSharedPhotos; $i++) {
                array_push($sharedFlowerPhotos, array_pop($flowerPhotosUnpicked));
            }

            $flower->photo()->sync(array_merge($flowerPhotos, $sharedFlowerPhotos));                        
        }

        $numOfAllTags = $numOfFlowers < 5 ? 3 : ceil($numOfFlowers/2);
        Tag::factory($numOfAllTags)->create();

        $tags = Tag::all();
        $allTagIds = [];

        foreach ($tags as $tag) {
            array_push($allTagIds, $tag->id);
        }

        foreach ($flowers as $flower) {
            $numOfTagsPerFlower = rand(2, $numOfAllTags < 4 ? $numOfAllTags : 4);
            $flowerTagsUnpicked = $allTagIds;
            $flowerTags = [];

            shuffle($flowerTagsUnpicked);

            for ($i = 0; $i < $numOfTagsPerFlower; $i++) {
                array_push($flowerTags, array_pop($flowerTagsUnpicked));                                
            }

            $flower->tag()->sync($flowerTags);
        }

        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
