<?php

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
    return view('welcome');
});

Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendar/schedule', [App\Http\Controllers\CalendarController::class, 'schedule'])->name('calendar.schedule');
Route::post('/calendar/schedule', [App\Http\Controllers\CalendarController::class, 'scheduleAdd'])->name('calendar.schedule.add');
