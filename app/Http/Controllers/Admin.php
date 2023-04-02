<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function login(Request $request)
    {
       
        return view('login');
    }
    public function do_login(Request $request)
    {
            $email=request('email');
            $password=request('password');

            $creadential=array(
                'email'=>$email,
                'password'=>$password
            );

            if(auth()->attempt($creadential))
            {
                return redirect()->route('posts');
            }
            else
            {
                return redirect()->route('login')->with('fail','Invalid creadentials');
            }
    }
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
