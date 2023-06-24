<?php

namespace App\Http\Controllers;

use App\Models\ManageAccount;
use Illuminate\Http\Request;

class ReportingController extends Controller
{
    public function report(){
        $accounts = ManageAccount::simplePaginate(8);
        return view('backend.pages.report.report',compact('accounts'));
    }
}
