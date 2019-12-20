<?php

use Illuminate\Database\Seeder;
use \Faker\Factory;
use \Faker\Provider\DateTime;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i <= 20; $i++){
            $title = $faker->word;
            $picture = $faker->imageUrl($width = 640, $height = 480);
            $content = $faker->text($maxNbChars = 200);
           
            DB::table('articles')->insert([
                'title' => $title,
                'picture' => $picture,
                'content' => $content,
            ]);
        }
       
    }
}
