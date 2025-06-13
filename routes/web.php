<?php

use App\Http\Controllers\HackathonController;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntrepreneurshipController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventsController;

Route::get('/login', function () { return view('auth.login'); })->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
    if (
        $request->username === env('ADMIN_USERNAME') &&
        $request->password === env('ADMIN_PASSWORD')
    ) {
        session(['is_admin' => true]);
        return redirect()->route('dashboard');
    }
    return back()->withErrors(['Invalid credentials']);
});

Route::post('/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('login');
})->name('logout');

Route::middleware(['admin'])->group(function() {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Entrepreneurship model routes
    Route::get('/entrepreneurship/list', [EntrepreneurshipController::class, 'index'])->name('entrepreneurship.list');
    Route::get('/entrepreneurship/create', [EntrepreneurshipController::class, 'create'])->name('entrepreneurship.create');
    Route::post('/entrepreneurship/add', [EntrepreneurshipController::class, 'add'])->name('entrepreneurship.add');
    Route::get('/entrepreneurship/edit/{id}', [EntrepreneurshipController::class, 'editForm'])->name('entrepreneurship.editForm');
    Route::patch('/entrepreneurship/edit/{id}', [EntrepreneurshipController::class, 'edit'])->name('entrepreneurship.edit');
    Route::delete('/entrepreneurship/delete/{id}', [EntrepreneurshipController::class, 'delete'])->name('entrepreneurship.delete');

    // Event model routes
    Route::get('/events/list', [EventsController::class, 'index'])->name('events.list');
    Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
    Route::post('/events/add', [EventsController::class, 'add'])->name('events.add');
    Route::get('/events/edit/{id}', [EventsController::class, 'editForm'])->name('events.editForm');
    Route::patch('/events/edit/{id}', [EventsController::class, 'edit'])->name('events.edit');
    Route::delete('/events/delete/{id}', [EventsController::class, 'delete'])->name('events.delete');

    // Hackathon model routes
    Route::get('/hackathons/list',[HackathonController::class, 'index'])->name('hackathons.list');
    Route::get('/hackathons/create',[HackathonController::class, 'create'])->name('hackathons.create');
    Route::post('/hackathons/add',[HackathonController::class, 'add'])->name('hackathons.add');
    Route::get('/hackathons/edit/{id}', [HackathonController::class, 'editForm'])->name('hackathons.editForm');
    Route::patch('/hackathons/edit/{id}', [HackathonController::class, 'edit'])->name('hackathons.edit');
    Route::delete('/hackathons/delete/{id}', [HackathonController::class, 'delete'])->name('hackathons.delete');
});