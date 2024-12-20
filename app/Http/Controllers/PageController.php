<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home'); // home.blade.php
    }

    public function products()
    {
        return view('products');
    }

    public function layanan()
    {
        return view('service');
    }

    public function pemesanan()
    {
        return view('order');
    }

    public function visimisi()
    {
        return view('visi-misi');
    }


}
