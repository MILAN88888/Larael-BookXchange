<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    function home()
    {
        if (session()->has('user_login')) {
            return redirect('/bookXchange/dashboard');
        } else {
            $recentBooks = app('App\Http\Controllers\BookController')->getRecentBook();

            $mostRateds = app('App\Http\Controllers\BookController')->getMostRated();

            $uniqueBookGenre = app('App\Http\Controllers\BookController')->getUniqueBookGenre();
            
            $searchAuthor = app('App\Http\Controllers\BookController')->getSearchAuthor();
            return view('header') . view('index', ['recentBooks'=>$recentBooks, 'mostRateds'=>$mostRateds, 'uniqueBookGenre'=>$uniqueBookGenre, 'searchAuthor'=>$searchAuthor]) . view('footer');
        }
    }

    function about()
    {
        return view('header') . view('about') . view('footer');
    }

    function signin()
    {
        return view('header') . view('signin') . view('footer');
    }

    function signup()
    {
        return view('header') . view('signup') . view('footer');
    }
}
