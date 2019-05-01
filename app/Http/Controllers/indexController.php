<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Gallery;

class indexController extends Controller
{

    public function index()
    {

        $gallerys = Gallery::all();

        return view('layouts.main', compact('gallerys'));

    }

    public function indexX()
    {
        $gallerys = Gallery::all();

        $faqs = Faq::all();

        return view('layouts.index', compact('gallerys','faqs'));

    }

}
