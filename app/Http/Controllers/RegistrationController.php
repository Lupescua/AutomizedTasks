<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //validate
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);

        //create & save new user
        $user=User::create(request(['name','email','password']));

        //sign them in
        auth()->login($user);

        //redirect to homepage
        return redirect("/");
        
    }
}
