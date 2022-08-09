<?

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User as EloquentUserModel;
class EloquentUserRepository implements UserRepositoryInterface
{
    protected EloquentUserModel $model;

    public function __construct(EloquentUserModel $model)
    {
        $this->model = $model;
    }

    public function getUserByEmail(string $email):array
    {
        return $this->model::where('email', $email)->get()->toArray();
    }
}
