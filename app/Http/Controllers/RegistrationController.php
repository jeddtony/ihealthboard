<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mail\Welcome;
use App\Mail;

class RegistrationController extends Controller
{
    //


    public function create(){
        return view('registration.create');
    }

    public function store(){

        // VALIDATING THE USER
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ] );
        $input_array = array('name' => request('name'), 'email' => request('email'), 'password' => bcrypt(request('password')));

        // CREATING A NEW USER
       $user = User::create($input_array);

        // SIGNING THEM IN
        auth()->login($user);

        // SEND THEM A WELCOME EMAIL
//        \Mail::to($user)->send(new Welcome);


        // REDIRECT TO THE HOME PAGE
        return redirect('/');
    }
}
