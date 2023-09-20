<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class WebsiteController extends Controller
{
    public function website(){
        $service = DB::table('service')->get();
        return view('frontend.pages.home',compact('service'));
    }

    public function hero(){
        return view('frontend\pages\hero');
    }
    public function package(){
        return view('frontend.pages.package');
    }
    public function services(){
        $service = DB::table('service')->get();
        return view('frontend.pages.service',compact('service'));
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
    public function serviceForm(){
        return view('backend.pages.frontendcomponents.service');
    }
    public function serviceAdd(Request $request){
        return DB::table('service')->insert($request->input());
    }
    public function serviceData(Request $request){
        $services = DB::table('service')->get();
        return response()->json($services);
    }

    public function packageForm(){
        return view('backend.pages.frontendcomponents.packageform');
    }
    public function serviceStore(Request $request){
        return DB::table('package')->insert($request->input());
    }
}
