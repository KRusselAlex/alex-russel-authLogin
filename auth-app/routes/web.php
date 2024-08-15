<?php

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('signup');
})->name('register');
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/profile', function () {
    return view('profile');
});


Route::controller(AuthController::class)->group(function () {
    //Auth Login Routes
    // Route::get('/login', 'index')->name('login');
    Route::post('/auth-login', 'authLogin')->name('auth.login');

    ///Auth Register Routes
    // Route::get('/register', 'register')->name('register');
    Route::post('auth-register', 'authRegister')->name('auth.register');

    ////Log Out Route
    Route::post('/logout', 'logout')->name('auth.logout');


    //social media

    Route::get('/auth/redirect/{social}','socialRedirect')->name('social-redirect');
    Route::get('/auth/callback/{social}', 'socialCallback')->name('social-callback');
});



// Route::get('/auth/redirect', function () {
//     return Socialite::driver('facebook')->redirect();
// });

// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('facebook')->user();

//     // $user->token
// });
