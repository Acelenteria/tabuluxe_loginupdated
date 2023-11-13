<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JudgingController extends Controller
{
    public function index() {
        return inertia('Judging/Index');
    }
}
