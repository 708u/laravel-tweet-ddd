<?php

use App\Eloquent\Tweet;
use App\Eloquent\User;
use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function ($user) {
            $user->tweets()->saveMany(
                factory(Tweet::class, 40)->make(),
            );
        });
    }
}
