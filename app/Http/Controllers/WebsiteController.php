<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class WebsiteController extends Controller
{
    public function website(){
        return view('frontend.pages.home');
    }

    public function hero(){
        return view('frontend\pages\hero');
    }
    public function package(){
        return view('frontend.pages.package');
    }
    public function services(){
        return view('frontend.pages.service');
    }
    public function contact(){
        return view('frontend.pages.contact');

    }
    public function about(){
        return view('frontend.pages.about');
    }

    public function contactStore(Request $request){

        return DB::table('contact')->insert($request->input());

    }
    public function contactForm(){
        return view('backend.pages.frontendcomponents.service');
    }
    public function serviceAdd(Request $request){
        return DB::table('service')->insert($request->input());
    }
}
