<?
namespace App\Interfaces;

interface LicenceRepositoryInterface
{
    public function getAllLicencesByUserId(int $user_id):array;
    public function setLicenceToUnavaliable(string $licence_uuid):bool;

}
