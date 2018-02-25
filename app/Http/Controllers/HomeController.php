<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Comment;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tickets = Ticket::orderBy('id', 'DESC')->paginate(8);
        $comments = Comment::orderBy('id', 'DESC')->paginate(8);

        return view('home')->with('tickets', $tickets)->with('comments', $comments);
        //return view("home",compact('tickets'));


    }
}
