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
        $user_detail = $request->validate([
            'username' => 'required|min:4|max:20|unique:users,username|alpha_dash',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);
        $user_array = ['username' => $user_detail['username'], 'password' => $user_detail['password'], 'email' => $user_detail['email']];
        $create_user = User::create($user_array);
        auth()->login($create_user);
        return redirect('/');
    }

    public function loginUserAccount(Request $request)
    {
        $login_credential = $request->validate([
            'login_user' => 'required',
            'login_password' => 'required'
        ]);

        $login_email = ['email' => $login_credential['login_user'], 'password' => $login_credential['login_password']];
        $login_username = ['username' => $login_credential['login_user'], 'password' => $login_credential['login_password']];

        if (auth()->attempt($login_email) || auth()->attempt($login_username)) {
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
