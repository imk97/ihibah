<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Notifications\InvestmentDuration;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            
            $all = DB::table('dividens')->get();
            if(view()->exists('home')) {
                return view('home')->with('data', $all);
            } else {
                abort(404);
            }
        } else {
            abort(401);
        }
        
    }

}
