<?php

namespace Database\Seeders;

use App\Models\Reply;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(1)->create();
         \App\Models\Post::factory(6)->create();
         \App\Models\Reply::factory(3)->create();
         \App\Models\Like::factory(5)->create();

        for ($i=0; $i < 5; $i++) {
            DB::table('follows')->insert(
                [
                    'user_id' => \App\Models\User::all()->random()->id,
                    'following_user_id' => \App\Models\User::all()->random()->id,
                ]
            );
        }
    }
}
