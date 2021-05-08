<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CodebookController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MailServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/users', function () {
    return view('users');
});*/

Route::get('/basic-table', function () {
    return view('basic-table');
});

/*Route::get('/email', function () {
    return view('email');
});*/

Route::get('/compose', function () {
    return view('compose');
});

//Route::get('/calendar', function () {
//    return view('calendar');
//});

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/charts', function () {
    return view('charts');
});

Route::get('/forms', function () {
    return view('forms');
});

Route::get('/ui', function () {
    return view('ui');
});

Route::get('/datatable', function () {
    return view('datatable');
});

Route::get('/google-maps', function () {
    return view('google-maps');
});

Route::get('/vector-maps', function () {
    return view('vector-maps');
});

Route::get('/blank', function () {
    return view('blank');
});

Route::get('/404', function () {
    return view('404');
});

Route::get('/500', function () {
    return view('500');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', function () {
    return view('signup');
});

/*Route::get('/admin', function (){
    return view('admin.dashboard');
});*/


Route::get('/home', [ClientController::class,'home']);
Route::get('/cars', [ClientController::class,'cars']);
Route::get('/gallery_view', [ClientController::class,'gallery_view']);
Route::get('/about', [ClientController::class,'about']);
Route::get('/contact', [ClientController::class,'contact']);
Route::post('/contact_mail', [MailController::class,'sendContactMail']);
Route::get('/profile', [ClientController::class,'profile'])->middleware('auth');

Route::resource('/reservation', ReservationController::class)->middleware('auth');
Route::resource('/car', CarController::class)->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('/user', UserController::class);
    Route::resource('/calendar', CalendarController::class);
    Route::resource('/codebook', CodebookController::class);
    Route::resource('/email', MailServiceController::class);

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','admin'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::post('/chat', [ChatController::class, 'getMessages']);
    Route::post('/chat_admin', [ChatController::class, 'getMessagesAdmin']);

    Route::post('/chat_notification', [ChatController::class, 'getMessagesNotifications']);
    Route::post('/chat_notification_user', [ChatController::class, 'getMessagesNotificationsUser']);
    Route::post('/chat_conversations', [ChatController::class, 'getConversations']);

    Route::post('/chat_seen', [ChatController::class, 'setSeenMessages']);
    Route::post('/chat_send', [ChatController::class, 'sendMessage']);

});

require __DIR__.'/auth.php';
