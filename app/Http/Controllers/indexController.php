<?php

namespace App\Http\Controllers;

use App\About;
use App\Faq;
use App\Gallery;
use App\User;
use Illuminate\Http\Request;

class indexController extends Controller
{

    public function index(Request $request)
    {
        $active_url = $request->route('id');

        if(!empty($active_url)){
            $this->activeUser($active_url);
        }

        $about = About::first();

        $gallerys = Gallery::all();

        $faqs = Faq::all();

        return view('layouts.index', compact('gallerys','faqs', 'about'));

    }

    public function activeUser($active_url){
        User::where('active_url', $active_url)
            ->where('active', 0)
            ->update(['active' => 1]);
    }

}
