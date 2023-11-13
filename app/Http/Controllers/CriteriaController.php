<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Contest $contest) {
        $request->validate([
            'criteria' => 'string|required',
            'description' => 'string|required',
            'weight' => 'numeric|required',
        ]);

        Criteria::create([
            'criteria' => $request->criteria,
            'description' => $request->description,
            'weight' => $request->weight,
            'contest_id' => $contest->id,
        ]);


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Criteria $criteria)
    {
        // $contests = $event->contests;

        return inertia('Criterias/Show', [
            'criteria' => $criteria,
            // 'contests' => $contests
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criteria $criteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, criteria $criteria)
    {
        $request->validate([
            'criteria' => 'required|string',
            'description' => 'required|string',
            'weight' => 'required|numeric',
        ]);

        $criteria->update([
            'criteria' => $request->input('criteria'),
            'description' => $request->input('description'),
            'weight' => $request->input('weight'),
        ]);
    
        // Optionally, you can return a response or redirect to a specific page
        return redirect()->route('criterias.show', ['criteria' => $criteria->id])->with('success', 'Criteria updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criteria $criteria)
    {
        $criteria->delete();

        // Optionally, you can return a response or redirect to a specific page
        return redirect('/events');
    }
}
