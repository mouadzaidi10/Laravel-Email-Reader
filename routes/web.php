<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use Webklex\PHPIMAP\ClientManager;

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



Route::get('/', function (){
    return view('welcome');
})->name('home.index');


Route::get('/all', [EmailController::class, 'Inbox'])->name('all.index');
Route::get('/import', [EmailController::class, 'Important'])->name('important.index');
Route::get('/send', [EmailController::class, 'Sent'])->name('send.index');
Route::get('/trash', [EmailController::class, 'Trash'])->name('trash.index');
Route::get('/spam', [EmailController::class, 'Spam'])->name('spam.index');
Route::get('/starred', [EmailController::class, 'Starred'])->name('starred.index');


Route::get('/login', function(){
    return view('login');
});

Route::post('/login', function(){
    $data = request(['email', 'password']);
    return $data;
});
