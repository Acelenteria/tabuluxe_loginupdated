<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::get();
        
        return inertia('Events/Index', [
            'events' => $events,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //
        $request->validate([
            'title' => 'required|string',
            'schedule' => 'required|date',
            'venue' => 'required|string',
            'computation' => 'required|string'
        ]);

        Event::create([
            'title' => $request->title,
            'schedule' => $request->schedule,
            'venue' => $request->venue,
            'computation' => $request->computation,
        ]);

        return redirect('/events');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $contests = $event->contests;

        return inertia('Events/Show', [
            'event' => $event,
            'contests' => $contests
        ]);
    }

    public function view(Contest $contest)
    {
        $criterias = $contest->criterias;

        return inertia('Events/Contests', [
            'contest' => $contest,
            'criterias' => $criterias,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string',
            'schedule' => 'required|date',
            'venue' => 'required|string',
            'computation' => 'required|string'
        ]);

        $event->update([
            'title' => $request->input('title'),
            'schedule' => $request->input('schedule'),
            'venue' => $request->input('venue'),
            'computation' => $request->input('computation'),
        ]);
    
        // Optionally, you can return a response or redirect to a specific page
        return redirect()->route('events.show', ['event' => $event->id])->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->contests()->delete();
        $event->delete();

        // Optionally, you can return a response or redirect to a specific page
        return redirect('/events');
    }
    
}
