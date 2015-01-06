<?php namespace HMCC\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  // TODO add comments
  public function all()
  {
    return $this->model->all();
  }

  public function store($data)
  {
    $newModel = new $this->model;

    $newModel->fill($data);

    return $newModel->save();
  }

  public function delete($id)
  {
    $record = $this->find($id);
    return $record->destroy($id);
  }

  public function update($id, $data)
  {
    $record = $this->find($id);

    $record->fill($data);

    return $record->save();
  }

  public function find($id)
  {
    // TODO check what fail does

    return $this->model->findOrFail($id);
  }


}
