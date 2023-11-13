<?php

use App\Http\Controllers\ContestController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\JudgeLoginController;
use App\Http\Controllers\JudgingController;
use App\Http\Controllers\LandingController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/choose', function () {
    return Inertia::render('Choose', [
        'canLogin' => Route::has('login'),
    ]);
});

Route::get('/judgelogin', function () {
    return Inertia::render('Auth/JudgeLogin', [
        'canLogin' => Route::has('login'),
    ]);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/judgelogin', [JudgeLoginController::class, 'index'])->name('judgelogin');
    Route::post('/judgelogin', [JudgeLoginController::class, 'login'])->name('judgelogin.login');   
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Route::middleware('role:judge')->group(function (){
        Route::get('judging', [JudgingController::class, 'index'])->name('judging');
        
    // });

    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::put('/events/{event}', [EventController::class, 'update']);
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::post('/events/{event}', [ContestController::class, 'store'])->name('contests.store');
    Route::get('/events/contest/{contest}', [ContestController::class, 'show'])->name('contests.show');
    Route::put('/events/contest/{contest}', [ContestController::class, 'update']);
    Route::delete('/events/contest/{contest}', [ContestController::class, 'destroy'])->name('contests.destroy');

    Route::post('/events/contest/{contest}', [CriteriaController::class, 'store'])->name('criterias.store');
    Route::get('/events/contest/criteria/{criteria}', [CriteriaController::class, 'show'])->name('criterias.show');
    Route::put('/events/contest/criteria/{criteria}', [CriteriaController::class, 'update']);
    Route::delete('/events/contest/criteria/{criteria}', [CriteriaController::class, 'destroy'])->name('criterias.destroy');
    
    Route::post('/events/contest/{contest}', [JudgeController::class, 'store'])->name('judges.store');

});
