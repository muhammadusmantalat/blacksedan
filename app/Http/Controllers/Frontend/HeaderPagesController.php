<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderPagesController extends Controller
{
    public function home(){
        return view('frontend.navbarpages.index');
    }
    public function about(){
        return view('frontend.navbarpages.about_us');
    }
    public function services(){
        return view('frontend.navbarpages.services');
    }
    public function fleet(){
        return view('frontend.navbarpages.our_fleet');
    }
    public function contact(){
        return view('frontend.navbarpages.contact');
    }
}
