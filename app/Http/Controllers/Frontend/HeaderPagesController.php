<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderPagesController extends Controller
{
    public function home(){
        return view('frontend.navbarpages.home');
    }
    public function about(){
        return view('frontend.navbarpages.aboutus');
    }
    public function services(){
        return view('frontend.navbarpages.our-services');
    }
}
