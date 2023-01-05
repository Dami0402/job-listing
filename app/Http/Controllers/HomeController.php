<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Advert;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        if (Auth::check() && Auth::user()->role === Role::Company) {
            $adverts = Advert::where('user_id', Auth::id())->published()->latest()->paginate(5);
            return view('home', ['adverts' => $adverts]);
        }
        elseif (Auth::check() && Auth::user()->role === Role::Admin) {
            $adverts = Advert::published()->latest()->paginate(5);
            return view('home', ['adverts' => $adverts]);
        }
    }
}

