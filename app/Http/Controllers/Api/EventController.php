<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Services\EventService;

class EventController extends Controller
{
    public function getAllEvents(): EventCollection
    {
        return new EventCollection(Event::query()->cursorPaginate(10));
    }

    public function getEvent($id): EventResource
    {
        return new EventResource(Event::query()->findOrFail($id));
    }

    public function deleteEvent($id)
    {
        if (Event::query()->findOrFail($id)->delete()) {
            return ['message' => 'Successfully deleted event'];
        }
        return ['error' => 'Something went wrong.'];
    }

    public function editEvent(EventRequest $request, $id, EventService $eventService)
    {
        $valid = $request->validated();
        if ($eventService->updateEvent($valid, $id)) {
            return ['message' => 'Successfully edited event'];
        }
        return ['error' => 'Something went wrong.'];
    }
}
