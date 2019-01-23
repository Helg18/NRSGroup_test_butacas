<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23/01/19
 * Time: 02:51 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\UserRepository;

class UserComposer
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function compose($view)
    {
        $users = $this->userRepository->search()->get();

        $view->with(compact('users'));
    }

}