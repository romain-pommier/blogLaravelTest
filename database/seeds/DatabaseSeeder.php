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

        dump('-----------------------USER----------------------------');

        $genres = ['male', 'female'];

        for($i =0; $i <= 9; $i++){
            $genre = $faker->randomElement($genres);
            $picture = 'https://randomuser.me/api/portraits/';
            $pictureId = $faker->numberBetween(1,99) . '.jpg';
            if($genre == "male"){
                $picture .= "men/".$pictureId;
            }
            else{
                $picture .=  "women/".$pictureId;
            }
            $username = $faker->userName;
            $userMail = $faker->freeEmail;
            $password = '12345678';
            $updateTime  = $faker->date($format = 'Y-m-d', $max = 'now').' '.$faker->time($format = 'H:i:s', $max = 'now');
            dump($username . ' ' .$userMail.' '.$password.' '.$updateTime);

            $created_at = $updateTime;

            DB::table('users')->insert([
                'name' => $faker->firstName($genre),
                'email' => $userMail,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'avatar' => $picture,
                'updated_at' =>$updateTime,
                'created_at' => $created_at,
                'id_role' => 1
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
            $roles = ['auteur','admin'];
        }
        dump('--------------ADMIN--------------------');
        DB::table('users')->insert([
            'name' => 'romain',
            'email' => 'romain-p31@hotmail.fr',
            'password' => password_hash("$password", PASSWORD_DEFAULT),
            'updated_at' =>$updateTime,
            'created_at' => $created_at,
            'id_role' => 2
        ]);


        dump('-----------------------ROLES----------------------------');
        for($x = 0; $x < count($roles); $x++){
            dump($roles[$x]);
            DB::table('role')->insert([
                'role_name' => $roles[$x],
            ]);
        }


    }
}
