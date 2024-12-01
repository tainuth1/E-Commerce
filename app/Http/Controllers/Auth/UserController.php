<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    
    public function registerForm(){
        return view('Auth.register');
    }
    public function register(RegisterRequest $request)
    {
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect(route('admin.dashboard'));
    }

    public function loginForm()
    {
        return view('Auth.login');
    }

    public function login(LoginRequest $request){
        
        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            
            Auth::login($user);

            if (Auth::user()->role == 'admin'){
                return redirect(route('admin.dashboard'));
            } else {
                return redirect(route('home'));
            }
        
        }

        return redirect(route('login'))->with('fail', 'Login Fail.');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function profile()
    {
        return view('Admin.profile');
    }

}
