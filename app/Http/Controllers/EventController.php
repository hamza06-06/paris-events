<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $events = $query
            ->orderBy('event_date')
            ->get();

        $categories = [
            'Concert',
            'Exposition',
            'Sport',
            'Théâtre',
        ];

        return view('events.index', compact('events', 'categories'));
    }
}