<?php

namespace App\Repositories\Interfaces;

/**
 * Interface RepositoryInterface
 * @package ilos\Repositories\Contracts
 */
interface RepositoryInterface extends RepositoryCriteriaInterface {

    /**
     * @param string $column
     * @return mixed
     */
    public function value($column = '');

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'));

    /**
     * @param array $columns
     * @return mixed
     */
    public function first($columns = array('*'));

    /**
     * @param $value
     * @param null $key
     * @return mixed
     */
    public function lists($value, $key = null);

    /**
     * @param $perPage
     * @param array $columns
     * @param bool $allCriteria
     * @return mixed
     */
    public function paginate($perPage = 10, $columns = array('*'), $allCriteria = false);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param $id
     * @param $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = 'id');

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function updateAndReturn(array $data, $id, $attribute = 'id');

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return Model|static
     */
    public function updateOrCreate(array $data, $id, $attribute = 'id');

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateRich(array $data, $id);

    /**
     * @param array|int $ids
     * @return int
     */
    public function delete($ids);

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return int
     */
    public function restore(\Illuminate\Database\Eloquent\Model $model);

    /**
     * @return mixed
     */
    public function deleteWhere($column, $operator, $value);

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'));

    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($field, $value, $columns = array('*'));

    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findAllBy($field, $value, $columns = array('*'));

    /**
     * @param $where
     * @param array $columns
     * @return mixed
     */
    public function findWhere($where, $columns = array('*'));

    /**
     * @param $id
     * @param $array
     * @param $where
     * @param array $columns
     * @param bool $preserveOrder
     * @return mixed
     */
    public function whereIn($id, array $array, $where = null, $columns = array('*'), $preserveOrder = false);

    /**
     * @param $whereRaw
     * @param array $columns
     * @return mixed
     */
    public function whereRaw($whereRaw, $columns = array('*'));

}
