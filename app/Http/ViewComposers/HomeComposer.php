<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 24/01/19
 * Time: 03:16 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\ReservationRepository;
use App\Repositories\UserRepository;

class HomeComposer
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @var ReservationRepository
     */
    protected $reservationRepository;

    /**
     * HomeComposer constructor.
     * @param UserRepository $userRepository
     * @param ReservationRepository $reservationRepository
     */
    public function __construct(UserRepository $userRepository, ReservationRepository $reservationRepository)
    {
        $this->userRepository = $userRepository;
        $this->reservationRepository = $reservationRepository;
    }

    public function compose($view)
    {
        $users = $this->userRepository->search()->get();
        $reservations = $this->reservationRepository->search()->get();

        $view->with(compact('users'));
        $view->with(compact('reservations'));

    }

}