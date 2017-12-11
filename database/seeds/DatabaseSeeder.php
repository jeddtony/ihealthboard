<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1, 10) as $index){
            DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),        ]);
        }

        foreach (range(1, 10) as $index){
            DB::table('threads')->insert([
                'user_id' => rand(1, 10),
                'title' => str_random(10),
                'body' => str_random(100),
                'number_of_views' => rand(1,50),
                'created_at' => now()
            ]);

        }

        foreach (range(1, 10) as $index){
            DB::table('thread_comments')->insert([
                'user_id' => rand(1, 10),
                'thread_id' => rand(1, 10),
                'body' => str_random(100),
                'created_at' => now()
            ]);

        }

        // THIS IS FOR THE TAG AND PIVOT TABLES
        foreach (range(1, 6) as $index){
            DB::table('tags')->insert([

                'name' => str_random(5),
                'created_at' => now()
            ]);

        }

        foreach (range(1, 10) as $index){
            DB::table('tag_thread')->insert([

                'tag_id' => rand(1, 6),
                'thread_id' => rand(1,10 )
            ]);

        }


    }
}
