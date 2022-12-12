<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard() {

 
        $recentBooks =app('App\Http\Controllers\BookController')->getRecentBook();

        $mostRateds = app('App\Http\Controllers\BookController')->getMostRated();
       
        $uniqueBookGenre = app('App\Http\Controllers\BookController')->getUniqueBookGenre();

        $searchAuthor = app('App\Http\Controllers\BookController')->getSearchAuthor();
        return view('header').view('dashboard',['recentBooks'=>$recentBooks, 'mostRateds'=>$mostRateds, 'uniqueBookGenre'=>$uniqueBookGenre, 'searchAuthor'=>$searchAuthor]).view('footer');
    }

}
