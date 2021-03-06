<?php

use App\Eloquent\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'foo@example.com',
        ]);

        factory(User::class, 99)->create();
    }
}
