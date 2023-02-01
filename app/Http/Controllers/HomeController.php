<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        if (Auth::user()->email == 'admin@poomji.com') {
            return redirect('/admin');
        } else {
            return view('home');
        }
    }

    public function adminlogin()
    {
        if (Auth::user()->email != 'admin@poomji.com') {
            return redirect('/home');
        } else {
            return view('admin');
        }
    }
    // public function admin()
    // {
    //     return view('admin');
    // }

    public function admincreate()
    {
        if (Auth::user()->email != 'admin@poomji.com') {
            return redirect('/home');
        } else {
            return view('create');
        }
    }
    public function create()
    {
        return view('create');
    }

    public function adminorder()
    {
        if (Auth::user()->email != 'admin@poomji.com') {
            return redirect('/home');
        } else {
            return view('order');
        }
    }
    public function order()
    {
        return view('order');
    }
}
