<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function nosotros()
    {
        return view('pages.nosotros');
    }

    public function contactanos()
    {
        return view('pages.contactanos');
    }
}
