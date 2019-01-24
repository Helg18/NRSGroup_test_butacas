<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23/01/19
 * Time: 10:12 PM
 */

namespace App\Repositories;


use App\Reservation;

/**
 * Class ReservationRepository
 * @package App\Repositories
 */
class ReservationRepository extends AbstractRepository
{
    /**
     * ReservationRepository constructor.
     * @param Reservation $reservation
     */
    public function __construct(Reservation $reservation)
    {
        $this->model = $reservation;
    }

    /**
     * @param array $filters
     * @param bool $distinct
     * @return mixed
     */
    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('reservations.*');

        if ($distinct) {
            $query->distinct();
        }

        return $query->orderBy('reservations.id', 'desc');
    }

}