<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/notification', function () {
    return view('pages.user_pages.notification');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/myevent/{id}/ticket', function () {
    return view('pages.my_event_pages.ticket');
});

Route::get('/myevent/{id}/poll', function () {
    return view('pages.my_event_pages.poll');
});

Route::get('/myevent/{id}/rating', function () {
    return view('pages.my_event_pages.rating');
});

Route::get('/myevent/{id}/support', function () {
    return view('pages.my_event_pages.support');
});

Route::get('/myevent/{id}/task', function () {
    return view('pages.my_event_pages.task');
});

Route::get('/myevent/{id}/attendee', function () {
    return view('pages.my_event_pages.attendee');
});

Route::get('/myevent/{id}/vendor', function () {
    return view('pages.my_event_pages.vendor');
});

Route::get('/myevent/{id}/analytic', function () {
    return view('pages.my_event_pages.analytic');
});

Route::get('/admin/manage-user', function () {
    return view('pages.admin_pages.manage_user');
});

Route::get('/admin/manage-user/{id}', function () {
    return view('pages.admin_pages.manage_user_event');
});

Route::get('/admin/manage-event/{id}', function () {
    return view('pages.admin_pages.manage_event');
});



Route::get('/account', [UserController::class, 'showUserDetail'])->middleware('auth');
Route::get('/signin', [UserController::class, 'showLoginForm'])->middleware('guest');
Route::get('/signup', [UserController::class, 'showRegisterForm'])->middleware('guest');
Route::post('/signup', [UserController::class, 'registerNewAccount'])->middleware('guest');
Route::post('/signin', [UserController::class, 'loginUserAccount'])->name('users.sign_in')->middleware('guest');
Route::post('/logout', [UserController::class, 'logoutUserAccount'])->middleware('auth');


Route::get('/create-event', [EventController::class, 'createNewEvent'])->middleware('authUser');
Route::get('/myevent', [EventController::class, 'showUserEvent'])->middleware('authUser');
Route::get('/myevent/{id}/info', [EventController::class, 'showEventInfo'])->middleware('authUser');
Route::get('/myevent/{id}/schedule', [EventController::class, 'showEventSchedule'])->middleware('authUser');
Route::get('/events', [EventController::class, 'showAllEvent']);
Route::get('/events/{id}', [EventController::class, 'showSelectedEvent']);
