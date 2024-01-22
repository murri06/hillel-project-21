<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getAllEvents()
    {
        return new EventResource(Event::all());
    }

    public function getEvent(Request $request)
    {
        return new EventResource(Event::query()->findOrFail($request->input('id')));
    }
}
