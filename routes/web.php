<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
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
    return view('welcome');
});


// Route::get('/prueba', function(){
//     return view('urvi');
// })->name('urvi');

// Route::get('/song',[SongController::class, 'index'])->name('song.index');
// Route::get('/song/create',[SongController::class, 'create'])->name('song.create');
// Route::post('/song/store', [SongController::class, 'store'])->name('song.store');
// Route::get('/song/{edit}/edit', [SongController::class, 'edit'])->name('song.edit');
// Route::put('/song/{edit}/update', [SongController::class, 'update'])->name('song.update');

Route::resource('song', SongController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
