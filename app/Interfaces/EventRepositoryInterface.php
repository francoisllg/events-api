<?
namespace App\Interfaces;

interface EventRepositoryInterface
{
    public function create(array $new_event_data):array;
    public function update(int $event_id,array $updated_event_data):array;
    public function getById(int $event_id):array;
    public function getAllEventsByUserId(int $user_id):array;
    public function delete(int $event_id):int;
}

