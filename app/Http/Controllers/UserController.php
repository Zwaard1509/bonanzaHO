<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Add this line

class UserController extends Controller
{
    public function index(){
        if($user = Auth::user()){
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pemesanan');
                    break;
            }
        }
        return view('auth.login');
    }

    public function cekLogin(AuthRequest $request){
        $credential = $request->only('email','password');
        $request->session()->regenerate();
        if(Auth::attempt($credential)){
            $user = Auth::user();
            switch ($user->level){
                case '1' :
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pemesanan');
                    break;
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'noFound' => 'Email atau Password Salah'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
