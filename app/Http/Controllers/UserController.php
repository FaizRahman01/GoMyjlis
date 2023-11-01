<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLoginForm(){
        return view('pages.login');
    }

    public function showRegisterForm(){
        return view('pages.register');
    }

    public function showUserDetail(){
        return view('pages.user_pages.account');
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
            return redirect('/signin');
        }
    }

    public function logoutUserAccount()
    {
        auth()->logout();
        return redirect('/signin');
    }
}
