<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('signup');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/profile', function () {
    $data = User::find(Auth::user()->id);
    return view('profile', ['data' => $data]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        $data = User::find(Auth::user()->id);
        $user =  User::find(Auth::user()->id);
        return view('profile', ['data' => $data, "user" => $user]);
    });

    Route::get('/dashboard', function () {
        $data = User::find(Auth::user()->id);
        return view('dashboard', ['data' => $data]);
    });

    Route::controller(UserController::class)->group(function () {
        Route::patch('editprofile', 'update');
        Route::get('userprofile',  "editprofileview");
        Route::get('alluser', 'alluser')->name("all-user");
        // Route::get('profile/editprofile', 'editprofileview');
        // Route::delete('deleteprofile', 'deleteAccount');
    });
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

    Route::get('/auth/redirect/{social}', 'socialRedirect')->name('social-redirect');
    Route::get('/auth/callback/{social}', 'socialCallback')->name('social-callback');
});
