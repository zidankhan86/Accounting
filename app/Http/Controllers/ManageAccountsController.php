<?php

namespace App\Http\Controllers;

use App\Models\ManageAccount;
use Illuminate\Http\Request;

class ManageAccountsController extends Controller
{
    // Add Accounts

    public function addAccount(){
        return view('backend.pages.manageAccount.addAccount');
    }

  public function addAccountCreate(Request $request){

    //dd($request->all());

    ManageAccount::create([

        "account_holder_name"=>$request->account_holder_name,
        "bank_name"=>$request->bank_name,
        "account_number"=>$request->account_number,
        "opening_balance"=>$request->opening_balance,
        "contact_number"=>$request->contact_number,
        "bank_address"=>$request->bank_address,

    ]);
    return back();

  }

}
