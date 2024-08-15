<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authLogin(Request $request)
    {
        //Form input validation
        $validatedAttributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        ///Authentification attemptation
        //But we can check, if it false, throw errors messages
        if (!Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                'email' => "Email or password is incorrect !"
            ]);
        }

        $user = User::where('email', $request->email)->first();

        Auth::login($user);

        ///New session regeneration for connected user
        request()->session()->regenerate();

        //Redirection to the root 
        return redirect('/dashboard');
    }

    public function register()
    {
        return view('register');
    }

    public function authRegister(Request $request)
    {
        //Input data validation

        $validatedAttributes =  $request->validate([
            'name' => ['required', 'string', 'regex:/^([A-Za-z0-9\-\_\s]+)$/'],
            'email' => ['required', 'unique:users', 'regex:/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'password' => ['required', Password::min(8)->max(16)->letters()->numbers()->symbols(), 'confirmed'],
        ]);

        // dd($validatedAttributes);
        $user = User::create($validatedAttributes);


        //User login

        // Auth::login($user);

        //Redirect
        return redirect('/');
    }

    public function socialRedirect($social)
    {

        return Socialite::driver($social)->redirect();
    }
    public function socialCallback($social)
    {


        $user = Socialite::driver($social)->user();

        // dd($user);
        if (User::where('email', $user->email)->exists()) {



            $users = User::where('email', $user->email)->first();


            Auth::login($users);
            ///New session regeneration for connected user
            request()->session()->regenerate();
            //Redirection to the root 
            return redirect('/dashboard');
        } else {
            $users = new User();
            if ($user->name) {

                $users->name = $user->name;
            } else {
                $users->name = $user->nickname;
            }

            $users->email = $user->email;
            $users->password = "12345";
            $users->method = $social;
            $users->token_auth = $user->token;
            $users->save();

            $userA = User::where('email', $user->email)->first();

            Auth::login($userA);
            ///New session regeneration for connected user
            request()->session()->regenerate();
            //Redirection to the root 
            return redirect('/dashboard');
        }

        // $user->token

    }


    public function logout()
    {
        // Logout current user!!
        Auth::logout();

        // //Redirect to root with disconnect status
        return redirect('/');
    }
}
