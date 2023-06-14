<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageAccountsController extends Controller
{
    // Add Accounts
    
    public function addAccount(){
        return view('backend.pages.manageAccount.addAccount');
    }
}
