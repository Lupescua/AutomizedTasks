<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except'=>'destroy']);
    }

    public function create()
    {

    }

    public function store()
    {
        // Attempt to authenticate the user

        if (! auth()->attempt(request(['email','password'])))
        {
            return back()->withErrors([
                'message'=>'please check your credentials'
            ]);
        }

        // If not, redirect back

        // If so, sign them in.

        // redirect to home page
        return redirect()->home();

    }
    public function destroy()
    {
        auth()->logout;

        return redirect()->home();
    }
}
