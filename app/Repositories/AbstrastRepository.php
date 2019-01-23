<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23/01/19
 * Time: 12:00 PM
 */

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{

    /**
     * @var Model $model
     */
    protected $model;

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function all()
    {
        return $this->model->all();
    }

    /**
     * @return Model
     */
    function newInstance()
    {
        return $this->model->newInstance();
    }

    /**
     * @param $id
     *
     * @return Model
     */
    function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    /**
     * @param array $ids
     * @return mixed
     */
    public function findMany(array $ids)
    {
        return $this->model->findMany($ids);
    }

    /**
     * @return mixed
     */
    function first()
    {
        return $this->model->first();
    }

    /**
     * @param array $attributes
     * @param array $values
     *
     * @return Model
     */
    function firstOrCreate(array $attributes = [], array $values = [])
    {
        return $this->model->firstOrCreate($attributes, $values);
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    function updateOrCreate(array $search = [], array $attributes = [])
    {
        return $this->model->updateOrCreate($search, $attributes);
    }

    /**
     * @param array $input
     *
     * @return Model
     */
    function create(array $input)
    {
        return $this->model->create($input);
    }

    /**
     * @param array $input
     *
     * @return static
     */
    function forceCreate(array $input)
    {
        $this->model->unguard();
        $instance = $this->model->create($input);
        $this->model->reguard();

        return $instance;
    }

    /**
     * @throws \Exception
     */
    public function deleteAll()
    {
        $this->model->delete();
    }

    /**
     * @param Model $model
     *
     * @return bool
     */
    public function save(Model $model)
    {
        return $model->save();
    }

    /**
     * @param Model $model
     * @param array $attributes
     * @return bool
     */
    public function update(Model $model, array $attributes)
    {
        return $model->update($attributes);
    }

    /**
     * Delete an Eloquent Model from database
     *
     * @param Model $model
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * Force a hard delete on a soft deleted model.
     *
     * This method protects developers from running forceDelete when trait is missing.
     *
     * @return bool|null
     */
    public function forceDelete(Model $model)
    {
        return $model->forceDelete();
    }

    /**
     *
     */
    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->model->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1 ;');
    }
}