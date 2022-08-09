<?
namespace Tests\Feature\Controllers\Api\Event;
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
            'user_id' =>2,
            'url' => fake()->url(),
            'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        ];

         // act // assert
         $this->actingAs(User::where('id', $new_event_data['user_id'])->first())
           ->post("api/events", $new_event_data)
            ->assertStatus(201)
            ->assertJsonStructure(array_keys($new_event_data), $new_event_data);

            Event::truncate();
            Licence::all()->each(function($licence){
                $licence->status = Licence::STATUS_AVAILABLE;
                $licence->save();
            });
    }
}
