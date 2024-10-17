<?php


use App\Http\Controllers\Auth\FastLogin;
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
})->name('welcome');

Route::get('/create-account', function () {
    return view('create-account');
})->name('create-account');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/fast-login/{userId}/{machineId}', [FastLogin::class, 'login'])->name('fast-login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/clients/register', function () {
        return view('register-client');
    })->name('register-client');

    Route::get('/clients', function () {
        return view('clients');
    })->name('clients');

    Route::get('/machines/register', function () {
        return view('register-machine');
    })->name('register-machine');

    Route::get('/machines', function () {
        return view('machines');
    })->name('machines');

    Route::prefix('/my')->group(function () {
        Route::get('/machines', function () {
            return view('my-machines');
        })->name('my-machines');
    });
});
