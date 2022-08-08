<?

namespace Tests\Unit\Controllers\Api\Event;
use App\Models\User;
use App\Models\Licence;
use App\Models\Event;
use Tests\TestCase;

class GetAllEventsByUserIdControllerTest extends TestCase
{
    /**
     * @test */
    public function controller_can_get_all_events_by_user_id()
    {
        Event::truncate();
        // arrange
        $user = User::all()->random();
        $events = Event::factory()->count(3)->create(['user_id' => $user->id]);

        // act
        $response = $this->get("/api/users/{$user->id}/events");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'url',
                    'end_date',
                    'user_id',
                    'licence_id',
                ],
            ],
        ]);


    }
}
