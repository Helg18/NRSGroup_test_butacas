<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23/01/19
 * Time: 12:53 PM
 */

namespace App\Repositories;

use App\User;

class UserRepository extends AbstractRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('users.*');

        if ($distinct) {
            $query->distinct();
        }

        return $query->orderBy('users.id', 'desc');
    }

}