<?php
namespace App\Repositories;

use App\Models\Event as EloquentEventModel;
use App\Interfaces\EventRepositoryInterface;



final class EloquentEventRepository implements EventRepositoryInterface
{
    protected EloquentEventModel $model;

    public function __construct(EloquentEventModel $model)
    {
        $this->model = $model;
    }


    public function create(array $new_event_data): array
    {
        return $this->model->create($new_event_data)->toArray();
    }


    public function update(int $event_id,array $updated_event_data):array
    {
      $event = $this->model->findOrFail($event_id);
      $event->update($updated_event_data);
      return $event->toArray();
    }

    public function getById(int $event_id):array
    {
        return $this->model->findOrFail($event_id)->toArray();
    }

    public function getAllEventsByUserId(int $user_id):array
    {
        return $this->model->where('user_id', $user_id)->get()->toArray();
    }

    public function delete(int $event_id):int
    {
        $event = $this->model->findOrFail($event_id);
        $event->delete();
        return $event_id;
    }


}
