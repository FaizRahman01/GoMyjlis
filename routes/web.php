<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticControllerr;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\TicketController;
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


Route::get('/account', [UserController::class, 'showUserDetail'])->middleware('auth');
Route::get('/signin', [UserController::class, 'showLoginForm'])->middleware('guest');
Route::get('/signup', [UserController::class, 'showRegisterForm'])->middleware('guest');
Route::post('/signup', [UserController::class, 'registerNewAccount'])->middleware('guest');
Route::post('/signin', [UserController::class, 'loginUserAccount'])->name('users.sign_in')->middleware('guest');
Route::post('/logout', [UserController::class, 'logoutUserAccount'])->middleware('auth');


Route::get('/admin/manage-user', [AdminController::class, 'showAllUsers'])->middleware('authAdmin');
Route::get('/admin/manage-user/{id}', [AdminController::class, 'showAllUserEvents'])->middleware('authAdmin');
Route::delete('/admin/manage-user/{id}', [AdminController::class, 'deleteUserAccount'])->middleware('authAdmin');
Route::get('/admin/manage-event/{id}', [AdminController::class, 'showEventOverview'])->middleware('authAdmin');
Route::delete('/admin/manage-event/{id}', [AdminController::class, 'deleteUserEvent'])->middleware('authAdmin');
Route::delete('/admin/manage-event/{event_id}/{ticket_id}', [AdminController::class, 'kickEventAttendee'])->middleware('authAdmin');


Route::get('/create-event', [EventController::class, 'showEventForm'])->middleware('authUser');
Route::get('/myevent', [EventController::class, 'showUserEvent'])->middleware('authUser');
Route::delete('/myevent/delete', [EventController::class, 'deleteUserEvent'])->middleware('authUser');
Route::put('/myevent/edit', [EventController::class, 'editUserEvent'])->middleware('authUser');
Route::get('/myevent/{id}/info', [EventController::class, 'showEventInfo'])->middleware('authUser');
Route::get('/myevent/{id}/schedule', [EventController::class, 'showEventSchedule'])->middleware('authUser');
Route::get('/events', [EventController::class, 'showAllEvent']);
Route::get('/events/{id}', [EventController::class, 'showSelectedEvent']);
Route::post('/create-event', [EventController::class, 'createNewEvent'])->middleware('authUser');
Route::post('/events/join', [EventController::class, 'joinSelectedEvent']);
Route::post('/myevent/{id}/activity', [EventController::class, 'addEventActivity']);
Route::delete('/myevent/{id}/remove-activity', [EventController::class, 'removeEventActivity']);


Route::get('/myevent/{id}/ticket', [TicketController::class, 'showEventTicket'])->middleware('authUser');
Route::get('/myevent/{id}/attendee', [TicketController::class, 'showEventAttendee'])->middleware('authUser');
Route::put('/myevent/{id}/accept', [TicketController::class, 'acceptEventAttendee'])->middleware('authUser');
Route::delete('/myevent/{id}/decline', [TicketController::class, 'declineEventAttendee'])->middleware('authUser');
Route::delete('/myevent/{id}/kick', [TicketController::class, 'kickEventAttendee'])->middleware('authUser');
Route::put('/myevent/{id}/hire', [TicketController::class, 'hireEventAssitant'])->middleware('authUser');
Route::put('/myevent/{id}/demote', [TicketController::class, 'demoteEventAttendee'])->middleware('authUser');
Route::put('/myevent/{id}/checkin', [TicketController::class, 'checkInEventAttendee'])->middleware('authUser');


Route::get('/myevent/{id}/poll', [FeedbackController::class, 'showEventPoll'])->middleware('authUser');
Route::post('/myevent/{id}/poll', [FeedbackController::class, 'createEventPoll'])->middleware('authUser');
Route::post('/myevent/{event_id}/poll/{poll_id}', [FeedbackController::class, 'answerEventPoll'])->middleware('authUser');
Route::put('/myevent/{event_id}/poll/{poll_id}', [FeedbackController::class, 'closeEventPoll'])->middleware('authUser');
Route::delete('/myevent/{event_id}/poll/{poll_id}', [FeedbackController::class, 'deleteEventPoll'])->middleware('authUser');
Route::get('/myevent/{id}/rating', [FeedbackController::class, 'showEventRating'])->middleware('authUser');
Route::post('/myevent/{id}/rating', [FeedbackController::class, 'createEventRating'])->middleware('authUser');


Route::get('/myevent/{id}/support', [OrganizerController::class, 'showEventSupport'])->middleware('authUser');
Route::post('/myevent/{id}/support', [OrganizerController::class, 'createSupportTicket'])->middleware('authUser');
Route::get('/myevent/{event_id}/support/{support_id}', [OrganizerController::class, 'showSupportChat'])->middleware('authUser');
Route::post('/myevent/{event_id}/support/{support_id}', [OrganizerController::class, 'createSupportMessage'])->middleware('authUser');
Route::put('/myevent/{event_id}/support/{support_id}', [OrganizerController::class, 'closeSupportMessage'])->middleware('authUser');
Route::get('/myevent/{id}/task', [OrganizerController::class, 'showEventTask'])->middleware('authUser');
Route::post('/myevent/{id}/create-task', [OrganizerController::class, 'createEventTask'])->middleware('authUser');
Route::put('/myevent/{id}/inprogress-task', [OrganizerController::class, 'setInProgressTask'])->middleware('authUser');
Route::put('/myevent/{id}/completed-task', [OrganizerController::class, 'setCompletedTask'])->middleware('authUser');
Route::delete('/myevent/{id}/remove-task', [OrganizerController::class, 'removeTask'])->middleware('authUser');
Route::get('/myevent/{id}/vendor', [OrganizerController::class, 'showEventVendor'])->middleware('authUser');
Route::post('/myevent/{id}/vendor', [OrganizerController::class, 'createEventVendor'])->middleware('authUser');
Route::get('/myevent/{event_id}/vendor/{vendor_id}', [OrganizerController::class, 'showVendorMessage'])->middleware('authUser');
Route::post('/myevent/{event_id}/vendor/{vendor_id}', [OrganizerController::class, 'createVendorMessage'])->middleware('authUser');


Route::get('/myevent/{id}/analytic', [AnalyticControllerr::class, 'showEventAnalytic'])->middleware('authUser');