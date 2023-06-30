<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Folder;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    const ROOT_NOTE_LENGTH = 20;
    const ROOT_FOLDER_LENGTH = 20;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name' => 'Jhon Doe',
            'email' => 'jhondoe@test.com',
        ]);

        $user2 = User::factory()->create([
            'name' => 'Jenny Doe',
            'email' => 'jennydoe@test.com',
        ]);

        $users = [$user1, $user2];
        for ($i = 0; $i < self::ROOT_FOLDER_LENGTH; $i++) {
            $author = $users[rand(0, 1)];
            Folder::factory()
                ->for($author, 'author')
                ->has(Note::factory()->for($author, 'author')->count(rand(0, 5)), 'notes')
                ->has(
                    Folder::factory()
                        ->for($author, 'author')
                        ->has(Note::factory()->for($author, 'author')->count(rand(0, 5)), 'notes')
                        ->count(rand(1, 5)),
                    'children'
                )
                ->create();
        }

        for ($i = 0; $i < self::ROOT_NOTE_LENGTH; $i++) {
            $author = $users[rand(0, 1)];
            Note::factory()
                ->for($author, 'author')
                ->create();
        }
    }
}
