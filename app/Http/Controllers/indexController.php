<?php

namespace App\Http\Controllers;

use App\About;
use App\Faq;
use App\Gallery;

class indexController extends Controller
{

    public function index()
    {
        $about = About::first();

        $gallerys = Gallery::all();

        $faqs = Faq::all();

        return view('layouts.index', compact('gallerys','faqs', 'about'));

    }

}
