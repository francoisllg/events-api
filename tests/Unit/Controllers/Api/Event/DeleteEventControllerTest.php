<?

namespace Tests\Unit\Controllers\Api\Event;
use App\Models\User;
use App\Models\Licence;
use App\Models\Event;
use Tests\TestCase;

class DeleteEventControllerTest extends TestCase
{
    /** @test */
    public function controller_can_delete_a_event()
    {
        Event::truncate();
        Event::factory(3)->create();
        $deleted_event = Event::all()->random();
        $this->delete("api/events/{$deleted_event->id}")
            ->assertStatus(201);

        $this->assertSoftDeleted('events', [
            'id' => $deleted_event->id,
            'name' => $deleted_event->name,
            'user_id' => $deleted_event->user_id,
            'licence_id' => $deleted_event->licence_id,
            'url' => $deleted_event->url,
            'end_date' => $deleted_event->end_date,
        ]);
        $this->assertCount(2, Event::all());


    }
}
