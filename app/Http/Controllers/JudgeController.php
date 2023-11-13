<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Judge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class JudgeController extends Controller
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
    public function store(Request $request, Contest $contest)
    {   
        
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string|unique:users',
        ]);
        
        // $role = Role::findOrFail(2);

        $judge = User::create([
            'name' => $request->name,
            'passcode' => Crypt::encrypt($request->password, false),
            // 'passcode' => $request->password,
            'password' => bcrypt($request->password),
            'role_id' => 2,
            'contest_id' => $contest->id,
        ]);

        // $judge->assignRole('judge');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Judge $judge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Judge $judge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Judge $judge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Judge $judge)
    {
        //
    }
}
