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
    public function airdrie(){
        return view('frontend.navbarpages.airdrie');
    }
    public function airportTransfer(){
        return view('frontend.navbarpages.airport-transfer');
    }
    public function inBaff(){
        return view('frontend.navbarpages.in_baff');
    }
    public function banffTravel(){
        return view('frontend.navbarpages.banff_travel');
    }
    public function calgary(){
        return view('frontend.navbarpages.calgary');
    }
    public function calgaryRental(){
        return view('frontend.navbarpages.calgary_rental');
    }
    public function canmore(){
        return view('frontend.navbarpages.canmore');
    }
    public function chestermere(){
        return view('frontend.navbarpages.chestermere');
    }
    public function cityTour(){
        return view('frontend.navbarpages.city_tour');
    }
    public function cochrane(){
        return view('frontend.navbarpages.cochrane');
    }
    public function limoServices(){
        return view('frontend.navbarpages.limo_services');
    }
    public function edmonton(){
        return view('frontend.navbarpages.edmonton');
    }
    public function fort(){
        return view('frontend.navbarpages.fort');
    }
    public function river(){
        return view('frontend.navbarpages.river');
    }
    public function calgaryLimo(){
        return view('frontend.navbarpages.calgary_limo');
    }
    public function lake(){
        return view('frontend.navbarpages.lake');
    }
    public function lethbridge(){
        return view('frontend.navbarpages.lethbridge');
    }
    public function okotos(){
        return view('frontend.navbarpages.okotos');
    }
    public function alberta(){
        return view('frontend.navbarpages.alberta');
    }
    public function premierLimo(){
        return view('frontend.navbarpages.premier_limo');
    }
    public function acrossAlberta(){
        return view('frontend.navbarpages.across_alberta');
    }
    public function priddis(){
        return view('frontend.navbarpages.priddis');
    }
    public function redDeer(){
        return view('frontend.navbarpages.red_deer');
    }
    public function sherwood(){
        return view('frontend.navbarpages.sherwood');
    }
    public function spurce(){
        return view('frontend.navbarpages.spurce');
    }
    public function albert(){
        return view('frontend.navbarpages.albert');
    }
    public function stony(){
        return view('frontend.navbarpages.stony');
    }
    public function strathmore(){
        return view('frontend.navbarpages.strathmore');
    }
    public function sylvan(){
        return view('frontend.navbarpages.sylvan');
    }
    public function limoService(){
        return view('frontend.navbarpages.limo_service');
    }
}
