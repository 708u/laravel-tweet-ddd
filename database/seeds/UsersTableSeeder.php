<?php

use App\Eloquent\User;
use Domain\Application\Contract\Uuid\UuidGeneratable;
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
            'uuid'  => app(UuidGeneratable::class)->nextIdentifier(),
            'email' => 'foo@example.com',
        ]);
    }
}
