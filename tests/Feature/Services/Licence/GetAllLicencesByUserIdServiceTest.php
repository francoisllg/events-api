<?
namespace Tests\Feature\Services\Licence;

use App\Services\Licence\GetAllLicencesByUserIdService;
use Tests\TestCase;

class GetAllLicencesByUserIdServiceTest extends TestCase
{

    public function setup(): void
    {
        parent::setup();
        $this->service = $this->app->make(GetAllLicencesByUserIdService::class);
    }

    /** @test */
    public function service_can_get_all_licences_by_user_id()
    {
        $result = $this->service->handle(2);
        $this->assertEquals(5, count($result));
        $this->assertArrayHasKey('id', $result[0]);
    }

}
