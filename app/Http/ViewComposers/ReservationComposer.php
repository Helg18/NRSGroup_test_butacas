<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23/01/19
 * Time: 10:11 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\ReservationRepository;

/**
 * Class ReservationComposer
 * @package App\Http\ViewComposers
 */
class ReservationComposer
{
    /**
     * @var ReservationRepository
     */
    protected $reservationRepository;

    /**
     * ReservationComposer constructor.
     * @param ReservationRepository $reservationRepository
     */
    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * @param $view
     */
    public function compose($view)
    {
        $reservations = $this->reservationRepository->search()->get();

        $view->with(compact('reservations'));
    }

}