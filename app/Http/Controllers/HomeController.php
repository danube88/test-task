<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(view()->exists('home')){
            return view('home');
        } else {
            abort(404);
        }
    }

    public function position() {
        if(view()->exists('position')){
            return view('position');
        } else {
            abort(404);
        }
    }
}
