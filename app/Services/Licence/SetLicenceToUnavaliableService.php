<?
namespace App\Services\Licence;

use App\Interfaces\LicenceRepositoryInterface;

class SetLicenceToUnavaliableService
{
    private $licenceRepository;

    public function __construct(LicenceRepositoryInterface $licenceRepository)
    {
        $this->licenceRepository = $licenceRepository;
    }

    public function handle(string $licence_uuid):bool
    {
       return $this->licenceRepository->setLicenceToUnavaliable($licence_uuid);
    }
}
