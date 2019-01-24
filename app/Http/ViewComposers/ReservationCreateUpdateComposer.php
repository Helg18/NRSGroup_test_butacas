<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23/01/19
 * Time: 10:52 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\ButacaRepository;
use App\Repositories\UserRepository;

class ReservationCreateUpdateComposer
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @var ButacaRepository
     */
    protected $butacaRepository;

    /**
     * ReservationComposer constructor.
     * @param ButacaRepository $butacaRepository
     * @param UserRepository $userRepository
     */
    public function __construct(ButacaRepository $butacaRepository, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->butacaRepository = $butacaRepository;
    }

    /**
     * @param $view
     */
    public function compose($view)
    {
        $users = $this->userRepository->search()->get();
        $butacas = $this->butacaRepository->search()->get();
        $selected = $this->butacaRepository->search(['available' => 0])->get()->pluck('id')->toArray();

        if (isset($view->reservation->butacas)) {
            $selected = $view->reservation->butacas->pluck('id')->toarray();
        }

        $view->with(compact('butacas'));
        $view->with(compact('users'));
        $view->with(compact('selected'));
    }

}