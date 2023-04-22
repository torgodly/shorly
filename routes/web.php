<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
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
    $users = User::count();
    return view('welcome', ['users' => $users]);
});


Route::domain('dash.' . env('APP_URL'))->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::get('page', [PageController::class, 'edit'])->name('page.edit');
        Route::post('page', [PageController::class, 'update'])->name('page.update');
//        create index for messages
        Route::get('messages', [MessageController::class, 'index'])->name('message.index');


    });
});


Route::get('{user:username}', [PageController::class, 'show'])->name('page.show')->domain(env('APP_URL'));
Route::get('{user:username}/message', [MessageController::class, 'create'])->name('message.create')->domain(env('APP_URL'));
Route::post('{user:username}/message', [MessageController::class, 'store'])->name('message.store')->middleware('throttle:10,1')->domain(env('APP_URL'));

require __DIR__ . '/auth.php';
