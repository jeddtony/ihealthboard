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
    }
}
