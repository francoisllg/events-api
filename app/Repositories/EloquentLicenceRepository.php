<?php
namespace App\Repositories;

use App\Models\Licence as EloquentLicenceModel;
use App\Interfaces\LicenceRepositoryInterface;



final class EloquentLicenceRepository implements LicenceRepositoryInterface
{
    protected EloquentLicenceModel $model;

    public function __construct(EloquentLicenceModel $model)
    {
        $this->model = $model;
    }


    public function getAllLicencesByUserId(int $user_id):array
    {
        return $this->model->where('user_id', $user_id)->where('status',$this->model::STATUS_AVAILABLE)->get()->toArray();
    }

    public function setLicenceToUnavaliable(string $licence_uuid):bool
    {
        $licence = $this->model->where('id', $licence_uuid)->first();
        if($licence){
            $licence->status = $this->model::STATUS_UNAVAILABLE;
            return $licence->save();
        }
        else{
            return false;
        }
    }
}
