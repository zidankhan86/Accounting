<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanManageController extends Controller
{
    public function addAuthorities(){
        return view('backend.pages.manageLoan.authorities');
    }
}
