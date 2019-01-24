<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23/01/19
 * Time: 12:53 PM
 */

namespace App\Repositories;

use App\Butaca;

/**
 * Class ButacaRepository
 * @package App\Repositories
 */
class ButacaRepository extends AbstractRepository
{
    /**
     * ButacaRepository constructor.
     * @param Butaca $user
     */
    public function __construct(Butaca $butaca)
    {
        $this->model = $butaca;
    }

    /**
     * @param array $filters
     * @param bool $distinct
     * @return mixed
     */
    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('butacas.*');

        if ($distinct) {
            $query->distinct();

            if (isset($filters['available']) && !is_null($filters['available'])) {
                $query->OfAvailable($filters['available']);
            }
        }

        return $query->orderBy('butacas.id', 'asc');
    }

    /**
     * Disable butacas
     * @param $id
     */
    public function disableButacasById($id)
    {
        if (is_array($id)) {
            collect($id)->map(function ($each) {
                $butaca = $this->getById($each);
                $butaca->available = false;
                $butaca->save();

            });
        } else {
            $butaca = $this->getById($id);
            $butaca->available = false;
            $butaca->save();
        }
    }

    /**
     * Enable Butacas
     * @param $id
     */
    public function enableButacasById($id)
    {

        /** @var ReservationRepository $repository */
        $repository = app(ButacaRepository::class);
        if (is_array($id)) {
            collect($id)->map(function ($each) use ($repository) {
                $butaca = $this->getById($each);
                $repository->update($butaca, ['available' => true]);
            });
        } else {
            $butaca = $this->getById($id);
            $repository->update($butaca, ['available' => true]);
        }

    }
}