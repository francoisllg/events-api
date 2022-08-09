<?php

namespace App\Services\Licence;
use App\Interfaces\LicenceRepositoryInterface;

class GetAllLicencesByUserIdService
{
    private $licenceRepository;

    public function __construct(LicenceRepositoryInterface $licenceRepository)
    {
        $this->licenceRepository = $licenceRepository;
    }

    public function handle(int $user_id):array
    {
        $userLicences = $this->licenceRepository->getAllLicencesByUserId($user_id);
        return $userLicences;
    }
}

