<?php
namespace App\Repositories\Implementation;

use App\Repositories\Interfaces\CriteriaInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Exceptions\RepositoryException;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Container\Container as App;
use Exception;
use Log;
use DB;


/**
 * Class BaseRepository
 * @package ilos\Repositories\Implementation
 */
abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var App
     */
    private $app;

    /**
     * @var Model|\Illuminate\Database\Eloquent\Builder
     */
    protected $model;

    /**
     * @var Collection
     */
    protected $criteria;

    /**
     * @var bool
     */
    protected $skipCriteria = false;

    /**
     * @param App $app
     * @throws RepositoryException
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->initialize();
    }

    private function initialize()
    {
        $this->criteria = new Collection();
        $this->resetScope();
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public abstract function model();

    /**
     * @param string $column
     * @return mixed
     */
    public function value($column = '') {
        $this->applyCriteria();
        return $this->model->value($column);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*')) {
        $this->applyCriteria();
        return $this->model->get($columns);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function first($columns = array('*')) {
        $this->applyCriteria();
        return $this->model->first($columns);
    }

    /**
     * @param  string $value
     * @param  string $key
     * @return array
     */
    public function lists($value, $key = null) {
        $this->applyCriteria();
        $lists = $this->model->lists($value, $key);
        if(is_array($lists)) {
            return $lists;
        }
        return $lists->all();
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @param bool $allCriteria
     * @return mixed
     */
    public function paginate($perPage = 10, $columns = array('*'), $allCriteria = false) {
        if($allCriteria === false)
        {
            $this->applyCriteria();
        }
        else
        {
            $this->applyAllCriteria();
        }

        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        return $this->model->create($data);
    }

    /**
     * TODO: we need to address all three update methods and make sure they are being used appropriately. Some can be merged.
     *
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = 'id') {
        $model = $this->model->where($attribute, '=', $id)->first();

        return $model
            ? $model->update($data)
            : false;
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return Model|null
     */
    public function updateAndReturn(array $data, $id, $attribute = 'id') {
        $model = $this->model->where($attribute, '=', $id)->first();
        $model = $model->fill($data);

        return $model->update()
            ? $model
            : null;
    }

    /**
     * TODO: we need to address all three update methods and make sure they are being used appropriately. Some can be merged.
     *
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return Model|static
     */
    public function updateOrCreate(array $data, $id, $attribute = 'id') {
        return $this->model->updateOrCreate([$attribute => $id], $data);
    }

    /**
     * @param  array  $data
     * @param  $id
     * @return mixed
     */
    public function updateRich(array $data, $id) {
        if (!($model = $this->model->find($id))) {
            return false;
        }

        return $model->fill($data)->save();
    }

    /**
     * @param array|int $ids
     * @return int
     */
    public function delete($ids) {
        return $this->model->destroy($ids);
    }

    /**
     * @param Model $model
     * @return int
     */
    public function restore(Model $model) {
        return $model->restore();
    }

    /**
     * @return mixed
     */
    public function deleteWhere($column, $operator, $value) {
        return $this->model->where($column, $operator, $value)->delete();
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        $this->applyCriteria();
        return $this->model->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*')) {
        $this->applyCriteria();
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findAllBy($attribute, $value, $columns = array('*')) {
        $this->applyCriteria();
        return $this->model->where($attribute, '=', $value)->get($columns);
    }

    /**
     * Find a collection of models by the given query conditions.
     *
     * @param array $where
     * @param array $columns
     * @param bool  $or
     *
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function findWhere($where, $columns = ['*'], $or = false)
    {
        $this->applyCriteria();

        $model = $this->model;

        foreach ($where as $field => $value) {
            if ($value instanceof \Closure) {
                $model = (! $or)
                    ? $model->where($value)
                    : $model->orWhere($value);
            } elseif (is_array($value)) {
                if (count($value) === 3) {
                    list($field, $operator, $search) = $value;
                    $model = (! $or)
                        ? $model->where($field, $operator, $search)
                        : $model->orWhere($field, $operator, $search);
                } elseif (count($value) === 2) {
                    list($field, $search) = $value;
                    $model = (! $or)
                        ? $model->where($field, '=', $search)
                        : $model->orWhere($field, '=', $search);
                }
            } else {
                $model = (! $or)
                    ? $model->where($field, '=', $value)
                    : $model->orWhere($field, '=', $value);
            }
        }
        return $model->get($columns);
    }

    /**
     * @param $id
     * @param array $array
     * @param null $where
     * @param array $columns
     * @param bool $preserveOrder
     * @return mixed
     */
    public function whereIn($id, array $array, $where = null, $columns = array('*'), $preserveOrder = false) {
        $this->applyCriteria();

        if($where)
        {
            $this->model = $this->model->where($where);
        }

        if($preserveOrder) {
            $values = implode ('", "', $array);
            $this->model = $this->model->orderBy(DB::raw('FIELD('.$id.', "'.$values.'")'));
        }

        return $this->model->whereIn($id, $array)->get($columns);
    }

    /**
     * @param $whereRaw
     * @param array $columns
     * @return mixed
     */
    public function whereRaw($whereRaw, $columns = array('*')) {
        $this->applyCriteria();

        $model = $this->model;

        return $model->whereRaw($whereRaw)->get($columns);
    }

    /**
     * @param $id
     * @param array $ids
     * @param array $data
     * @return integer
     */
    public function updateManyBy($id, array $ids, array $data) {
        return $this->model->whereIn($id, $ids)
            ->update($data);
    }

    /**
     * @return Model
     * @throws RepositoryException
     */
    private function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }

    /**
     * @return $this
     */
    private function resetScope() {
        $this->skipCriteria(false);
        return $this;
    }

    /**
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true){
        $this->skipCriteria = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCriteria() {
        return $this->criteria;
    }

    /**
     * @param CriteriaInterface $criteria
     * @return $this
     */
    public function getByCriteria(CriteriaInterface $criteria) {
        $this->model = $criteria->apply($this->model, $this);
        return $this;
    }

    /**
     * @param CriteriaInterface $criteria
     * @return $this
     */
    public function pushCriteria(CriteriaInterface $criteria) {
        $this->criteria->push($criteria);
        return $this;
    }

    /**
     * @return $this
     */
    public function resetRepository()
    {
        $this->initialize();
        return $this;
    }

    /**
     * @return $this
     */
    public function applyCriteria() {
        if($this->skipCriteria === true)
            return $this;

        foreach($this->getCriteria() as $criteria) {
            if($criteria instanceof CriteriaInterface){
                $this->model = $criteria->apply($this->model, $this);
            }
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function applyAllCriteria() {
        if($this->skipCriteria === true)
            return $this;

        $this->model = $this->applyAll($this->model, $this);

        return $this;
    }

    public function applyAll($model, RepositoryInterface $repository)
    {
        $criteria = $repository->getCriteria();

        $groupedCriteria = [];

        foreach($criteria as $key => $criterium)
        {
            $object = get_class($criterium);

            $groupedCriteria[$object][] = $criterium;
        }

        foreach($groupedCriteria as $key => $criteria)
        {
            if(count($criteria) < 2)
            {
                if($criteria[0] instanceof CriteriaInterface){
                    $model = $criteria[0]->apply($model, $repository);
                }
                continue;
            }

            $criteriaInterfaceObject = new $key();

            if(!method_exists($criteriaInterfaceObject, "applyGroup"))
            {
                continue;
            }

            $criteriaInterfaceObject->applyGroup($model, $criteria);
        }

        return $model;
    }

    /**
     * The Plastic package have a bug and doesn't update the index (works for save and delete). For that reason I added this here
     *
     * @param Model $model
     * @return void
     */
    private function updateSearchIndex($model) {
        if(method_exists ( $model , 'document' )){
            //The document might have been deleted before
            try {
                $model->document()->update();
            } catch (Exception $e) {
                Log::warning($e->getMessage());
            }
        }
    }
}
