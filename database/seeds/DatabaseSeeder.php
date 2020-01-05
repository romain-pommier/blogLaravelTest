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
//        for($i = 0; $i <= 15; $i++){
//            $nbrArticles = random_int ( 2 , 8 );
//
//        }
        for($i =0; $i <= 9; $i++){
            $username = $faker->userName;
            $userMail = $faker->freeEmail;
            $password = '12345678';
            $updateTime  = $faker->date($format = 'Y-m-d', $max = 'now').' '.$faker->time($format = 'H:i:s', $max = 'now');
            dump($username . ' ' .$userMail.' '.$password.' '.$updateTime);

            $created_at = $updateTime;
            DB::table('users')->insert([
                'name' => $username,
                'email' => $userMail,
                'password' => $password,
                'updated_at' =>$updateTime,
                'created_at' => $created_at,
            ]);
            $nombreRandom = mt_rand(0, 5);
            for($y = 0; $y <= $nombreRandom; $y++){
                $title = $faker->word;
                $picture = $faker->imageUrl($width = 640, $height = 480);
                $content = $faker->text($maxNbChars = 200);

                DB::table('articles')->insert([
                    'title' => $title,
                    'picture' => $picture,
                    'content' => $content,
                    'id_user'=>$i+1,
                ]);
            }

        }

       
    }
}
