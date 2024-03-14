<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return Attendance::all();
    }

    public function store(Request $request)
    {
        return Attendance::create($request->all());
    }

    public function show(Attendance $attendance)
    {
        return $attendance;
    }

    public function update(Request $request, Attendance $attendance)
    {
        $attendance->update($request->all());
        return $attendance;
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return response()->json(null, 204);
    }
    
    public function getByEventId($eventId)
    {
        $attendances = Attendance::where('event_id', $eventId)->get();
        return response()->json($attendances);
    }
}
