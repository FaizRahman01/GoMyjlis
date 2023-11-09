<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function showRegisterForm()
    {
        return view('pages.register');
    }

    public function showUserDetail()
    {
        return view('pages.user_pages.account');
    }

    public function updateUserProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|min:4|max:20|alpha_dash|unique:users,username,'.auth()->id(),
            'email' => 'required|email|unique:users,email,'.auth()->id()
        ]);

        auth()->user()->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect('/account');

    }

    public function updateUserPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:new_password'
        ]);

        if(Hash::check($request->old_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->new_password)]);

            return redirect('/account');
        }
        else{
            return redirect('/account')->with('error', 'You old password is incorrect');
        }
    }
    //
    public function registerNewAccount(Request $request)
    {
        $userInput = $request->validate([
            'username' => 'required|min:4|max:20|unique:users,username|alpha_dash',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);
        $userDataArray = ['username' => $userInput['username'], 'password' => $userInput['password'], 'email' => $userInput['email']];
        $newUserData = User::create($userDataArray);
        auth()->login($newUserData);
        return redirect('/');
    }

    public function loginUserAccount(Request $request)
    {
        $loginInput = $request->validate([
            'login_user' => 'required',
            'login_password' => 'required'
        ]);

        $loginByEmail = ['email' => $loginInput['login_user'], 'password' => $loginInput['login_password']];
        $loginByUsername = ['username' => $loginInput['login_user'], 'password' => $loginInput['login_password']];

        if (auth()->attempt($loginByEmail) || auth()->attempt($loginByUsername)) {
            $request->session()->regenerate();
            return redirect('/events');
        } else {
            return redirect('/signin')->with('error', 'Your username or password is incorrect');
        }
    }

    public function logoutUserAccount()
    {
        auth()->logout();
        return redirect('/signin');
    }
}
