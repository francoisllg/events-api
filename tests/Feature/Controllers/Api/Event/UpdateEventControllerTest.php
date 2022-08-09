<?

namespace Tests\Feature\Controllers\Api\Event;
use App\Models\User;
use App\Models\Licence;
use App\Models\Event;
use Tests\TestCase;

class UpdateEventControllerTest extends TestCase
{
    /** @test */
    public function controller_can_update_an_event()
    {
      //arrange
      Event::truncate();
      $old_event = Event::factory(1)->create()->first();


      $update_event_data = [
            'name' => 'New Event Name',
            'url' => fake()->url(),
            'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
      ];


         // act // assert
         $this->actingAs(User::where('id', $old_event->user_id)->first())
         ->patch("api/events/".$old_event->id, $update_event_data)
         ->assertStatus(200)
         ->assertJsonStructure(array_keys($update_event_data), $update_event_data);

    }
}
