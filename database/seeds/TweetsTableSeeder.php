<?php

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
        $users = User::all();
        $users->each(function ($user) {
            $user->tweets()->createMany([
                ['content' => 'hello world!'],
                ['content' => 'こんにちは、世界!'],
            ]);
        });
    }
}
