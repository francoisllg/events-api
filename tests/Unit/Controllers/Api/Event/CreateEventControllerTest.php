<?

namespace Tests\Unit\Controllers\Api\Event;
use App\Models\User;
use App\Models\Licence;
use App\Models\Event;
use Tests\TestCase;

class CreateEventControllerTest extends TestCase
{
    /** @test */
    public function controller_can_create_an_event()
    {
         // arrange
         Event::truncate();

         $new_event_data = [
            'name' => 'Test Event',
            'user_id' => User::all()->random()->id,
            'licence_id' => Licence::all()->random()->id,
            'url' => fake()->url(),
            'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        ];

         // act // assert
           $this->post("api/events", $new_event_data)
            ->assertStatus(201)
            ->assertJsonStructure(array_keys($new_event_data), $new_event_data);
    }
}
