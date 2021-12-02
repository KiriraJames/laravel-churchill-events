<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.add');
Route::get('/admin/edit/{event}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/save', [AdminController::class, 'store'])->name('admin.store');
Route::post('/admin/update/{event}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/delete/{event}', [AdminController::class, 'destroy'])->name('admin.destroy');


Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/events/{event}', [EventsController::class, 'show'])->name('event.info');
//make to use slug instead of event_id, {event:slug_name}

Route::get('search/events', [EventsController::class, 'search'])->name('search.events');
Route::get('search/tickets', [TicketsController::class, 'search'])->name('search.tickets');

Route::get('/my-tickets', [TicketsController::class, 'index'])->name('tickets');
Route::get('/my-tickets/search', [TicketsController::class, 'search'])->name('tickets.search');
Route::get('/my-tickets/ticket/{ticket}', [TicketsController::class, 'show'])->name('ticket.info');
Route::get('/my-tickets/event/{event}', [TicketsController::class, 'show_multiple'])->name('ticket.event.info');
Route::get('/my-tickets/event/{event}/book', [TicketsController::class, 'create'])->name('ticket.book');
Route::post('/my-tickets/{event}/book', [TicketsController::class, 'store'])->name('ticket.save');
Route::delete('/my-tickets/{ticket}', [TicketsController::class, 'destroy'])->name('ticket.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
