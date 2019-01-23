<?php

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
        $r = app(\App\Repositories\UserRepository::class);

        $henry = [
            'first_name' => "Henry",
            'last_name' => "Leon",
            'email' => "helg18@gmail.com"
        ];

        $r->firstorcreate($henry);
    }
}
