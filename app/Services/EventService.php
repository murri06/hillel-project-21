<?php

namespace App\Services;

use App\Models\Event;

class EventService
{

    public function updateEvent($valid, $id)
    {
        return Event::query()->findOrFail($id)->update([
            'title' => $valid['title'],
            'user_id' => $valid['user_id'],
            'notes' => $valid['notes'],
            'dt_start' => $valid['date_start'],
            'dt_end' => $valid['date_end'],
        ]);
    }

    public function createEvent($valid)
    {
        $event = Event::create([
            'title' => $valid['title'],
            'user_id' => $valid['user_id'],
            'notes' => $valid['notes'],
            'dt_start' => $valid['date_start'],
            'dt_end' => $valid['date_end'],
        ]);
        return $event->save();
    }
}
