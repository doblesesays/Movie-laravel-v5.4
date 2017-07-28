<?php

namespace Movie\Http\Controllers;

use Illuminate\Http\Request;
use Movie\Http\Requests;
use Movie\Http\Controllers\Controller;
use Movie\Movie;

class FrontController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['only'=>'admin']);
    }

    public function index()
    {
        return view('index');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function reviews()
    {
        $movies = Movie::Movies();
        return view('reviews', compact('movies'));   
    }

    public function admin()
    {
        return view('admin.index');
    }
}
