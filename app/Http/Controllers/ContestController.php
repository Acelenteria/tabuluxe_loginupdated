<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contests = Contest::get();
        
        return inertia('Events/Contests', [
            'contests' => $contests,
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
    public function store(Request $request, Event $event) {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
        ]);

        Contest::create([
            'name' => $request->name,
            'description' => $request->description,
            'event_id' => $event->id,
        ]);


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contest $contest)
    {
        
        $criterias = $contest->criterias;
        $users = $contest->users;

        $judges = [];
        
        foreach($users as $usr) {
            $judges[] = [
                'name' => $usr->name,
                'password' => Crypt::decrypt($usr->passcode, false)
            ];
        }

        return inertia('Contests/Contest', [
            'contest' => $contest,
            'criterias' => $criterias,
            'users' => $judges
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contest $contest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contest $contest)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $contest->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
    
        // Optionally, you can return a response or redirect to a specific page
        return redirect()->route('contests.show', ['contest' => $contest->id])->with('success', 'Contest updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contest $contest)
    {
        $contest->criterias()->delete();
        $contest->delete();

        // Optionally, you can return a response or redirect to a specific page
        return redirect('/events');
    }
}
