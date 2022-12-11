<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function addbook() {
        return view('header').view('addbook').view('footer');
    }
}
