<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        $data = User::find($id);
       
        return view('profile.userprofile', ['data' => $data]);
    }

    public function editprofileview()
    {
        $data = User::find(Auth::user()->id);
        return view('profile', ['data' => $data]);
    }


    public function update(Request $request)
    {

        $id = Auth::user()->id;

        $request->validate([

            'name' => ['required', 'string', 'regex:/^([A-Za-z0-9\-\_\s]+)$/'],
            'email' => 'required|email',
            'oldpassword' => 'required'


        ]);

        $user = User::findOrFail($id);

        if ($request->input('password')) {

            $request->validate([

                'password' => ['required', Password::min(8)->max(16)->letters()->numbers()->symbols()],
                'password_confirmation' => 'required_with:password',
            ]);
            if (Hash::check($request->input('oldpassword'), $user->password)) {


                $user->update([
                    'name' => request('name'),
                    'email' => request('email'),
                    'password' => request('password')

                ]);
            } else {

                return redirect("profile/editprofile")->with('status', "Old password is incorrect");
            }
        } else {

            if (Hash::check($request->input('oldpassword'), $user->password)) {

                $user->update([

                    'name' => request('name'),
                    'email' => request('email')
                ]);
            } else {

                return redirect("profile/editprofile")->with('status', "You need to add the correct old password");
            }
        }

        return redirect("profile/userprofile")->with('status', "Profile updated");
    }

    public function destroy()
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->delete();
        Auth::logout();
        return redirect('/');
    }
}
