<?php

namespace App\Http\Controllers;

use App\Models\Judge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class JudgeLoginController extends Controller
{
    public function index () {
        return inertia('Auth/JudgeLogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
            'email' => 'required|email'
        ]);

        $judge = User::where('email', $request->email)->first();

        if (!$judge) {
            return redirect()->route('judgelogin')->with('error', 'Email is not found');
        }

        $login = Auth::attempt([
            'email' => $request->email,
            'password'=>$request->password
        ]);


        if ($login) {
            return redirect()->route('contests.show',['contest'=>$judge->contest_id]);
        }
    }

}
