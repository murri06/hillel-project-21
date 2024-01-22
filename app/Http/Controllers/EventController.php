<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\User;
use App\Services\EventService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{

    public function list(): View
    {
        return view('events.list', [
            'events' => Event::query()->cursorPaginate(10),
        ]);
    }

    public function details($id): View
    {
        $event = Event::query()->findOrFail($id);
        return view('events.details', [
            'event' => $event,
            'user' => $event->user,
        ]);
    }

    public function addEventForm(): View
    {
        return view('events.create', [
            'users' => User::all(),
        ]);
    }

    public function addEvent(EventRequest $request, EventService $eventService): RedirectResponse
    {
        $valid = $request->validated();
        $eventService->createEvent($valid);
        return to_route('events');
    }

    public function editEventForm($id): View
    {
        return view('events.create', [
            'event' => Event::query()->findOrFail($id),
            'users' => User::all(),
        ]);
    }

    public function editEvent(EventRequest $request, $id, EventService $eventService): RedirectResponse
    {
        $valid = $request->validated();
        $eventService->updateEvent($valid, $id);
        return to_route('events');
    }

    public function deleteEvent($id): RedirectResponse
    {
        $event = Event::query()->findOrFail($id);
        $event->delete();
        return to_route('events');
    }

}
