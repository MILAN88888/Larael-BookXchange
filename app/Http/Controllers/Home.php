<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    function home() {
        if(session()->has('user_login')) {
            return view('header').view('dashboard').view('footer');
        } else {
            return view('header').view('index').view('footer');
        }
        
    }

    function about() {
        return view('header').view('about').view('footer');
    }

    function signin() {
        return view('header').view('signin').view('footer');
    }

    function signup() {
        return view('header').view('signup').view('footer');
    }
}
