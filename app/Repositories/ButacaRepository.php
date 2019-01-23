<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23/01/19
 * Time: 12:53 PM
 */

namespace App\Repositories;

use App\Butaca;

class ButacaRepository extends AbstractRepository
{
    public function __construct(Butaca $user)
    {
        $this->model = $user;
    }

    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('butacas.*');

        if ($distinct) {
            $query->distinct();
        }

        return $query->orderBy('butacas.id', 'desc');
    }

}