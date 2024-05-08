<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }


    public function store()
    {
        $register_data = request()->validate([
            'name' => ['required', 'max:255', 'min:3', Rule::unique('users', 'name')],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6']
        ]);
        // $form_data['password']=bcrypt($form_data['password']);
        $user = User::create($register_data);
        auth()->login($user);
        // session()->flash('success', 'Welcome Dear, ' .$user->name);
        return redirect('/')->with('success', 'Welcome Dear, ' . $user->name);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'good bye');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        $login_data = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required', 'min:6', 'max:50']
        ], [
            'email.required' => 'Need your email address',
            'password.min' => 'Password should be more than 8 characters'
        ]);

        if (auth()->attempt($login_data)) {
            return redirect('/')->with('success', 'Welcome back');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Incorrect Password'
            ]);
        }
    }
}
