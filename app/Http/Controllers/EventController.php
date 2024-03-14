<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();
        if ($request->has('event_name')) {
            $query->where('event_name', 'like', '%' . $request->query('event_name') . '%');
        }

        // Paginate the results with optional limit and page parameters
        $limit = $request->query('limit', 10);
        $events = $query->paginate($limit)->appends($request->query());

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Success get data',
            'page' => $events->currentPage(),
            'limit' => $events->perPage(),
            'total_pages' => $events->lastPage(), // Add total pages
            'total_data' => $events->total(),
            'data' => $events->items(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string',
            'event_date' => 'required|date',
            'event_start' => 'required|date_format:H:i',
        ]);

        // Check if the event name already exists
        $existingEvent = Event::where('event_name', $request->event_name)->first();
        if ($existingEvent) {
            return response()->json([
                'code' => 400,
                'success' => false,
                'message' => 'Event with the same name already exists.',
            ], 400);
        }

        // Create the new event
        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_date = $request->event_date;
        $event->event_start = $request->event_start;
        $event->save();

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Event created successfully.',
            'data' => $event,
        ], 201);
    }

    public function show($id)
    {
        $event = Event::with('attendances')->findOrFail($id);
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Success get data',
            'data' => $event
        ]);
    }


    protected function notFoundResponse()
    {
        return response()->json([
            'code' => 404,
            'success' => false,
            'message' => 'Resource not found'
        ], 404);
    }
}
