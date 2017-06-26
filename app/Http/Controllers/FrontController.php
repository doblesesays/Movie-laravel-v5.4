<?php

namespace Movie\Http\Controllers;

use Illuminate\Http\Request;
use Movie\Http\Requests;
use Movie\Http\Controllers\Controller;

class FrontController extends Controller
{
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
        return view('reviews');
    }

    public function admin()
    {
        return view('admin.index');
    }
}
