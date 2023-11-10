<?php

use App\Http\Controllers\Controller;
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

Route::view('/child', 'child');

// Route::post('/submit', [Controller::class, 'store'])->name('login');

Route::get('/difficulty', function () {
    return view('difficulty');

})

->middleware(['verified']);

Route::get('/home', function () {
    return view('difficulty');
})
// ->name('home')
->middleware(['verified']);

Route::get('/gameplay-easy', function () {
    return view('gameplay-easy');

})

->middleware(['verified']);
Route::get('/gameplay-medium', function () {
    return view('gameplay-medium');
})
->middleware(['verified']);

Route::get('/gameplay-hard', function () {
    return view('gameplay-hard');
})
->middleware(['verified']);
