<?php

use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserTableSeeder constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect(
            [
                'first_name' => 'Henry',
                'last_name' => 'Leon',
                'email' => 'helg18@gmail.com'
            ],
            [
                'first_name' => 'Esteban',
                'last_name' => 'Gomez',
                'email' => 'ehgl@gmail.com'
            ],
            );

        $users->map(function ($user) {
            $this->userRepository->firstOrCreate($user);
        });

    }
}
