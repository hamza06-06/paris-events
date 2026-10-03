<?php

namespace App\Http\Controllers;

use App\Services\ParisEventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(
        private ParisEventService $eventService
    ) {
    }

    public function index(Request $request)
    {
        $categories = [
            'Concert',
            'Exposition',
            'Sport',
            'Théâtre',
        ];

        try {
            $events = $this->eventService->getEvents(
                $request->input('search'),
                $request->input('category')
            );

            $error = null;

        } catch (\Throwable $exception) {

            $events = collect();

            $error =
                'Impossible de charger les événements pour le moment.';
        }

        return view(
            'events.index',
            compact('events', 'categories', 'error')
        );
    }

    public function show(string $id)
    {
        $event = $this->eventService->getEvent($id);

        abort_if(!$event, 404);

        return view(
            'events.show',
            compact('event')
        );
    }
}