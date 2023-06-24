<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManageAccount;

class HomeController extends Controller
{
    public function home(){
        // return view('backend.pages.home');
        $accounts = ManageAccount::simplePaginate(8);
        return view('backend.pages.report.report',compact('accounts'));
    }
}
