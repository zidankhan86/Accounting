<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManageAccount;
use Illuminate\Support\Facades\Validator;

class ManageAccountsController extends Controller
{
    // Add Accounts

    public function addAccount(){
        return view('backend.pages.manageAccount.addAccount');
    }

         public function addAccountCreate(Request $request){

            //Validation
            $validator = Validator::make($request->all(), [
                'account_holder_name' => 'required|string',
                'bank_name' => 'required|string',
                'account_number' => 'required|string',
                'opening_balance' => 'required|numeric',
                'contact_number' => 'required|string',
                'bank_address' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Validation passed, create account
            // ManageAccount::create($request->all());


         //dd($request->all());

         ManageAccount::create([

            "account_holder_name"   =>$request->account_holder_name,
            "bank_name"             =>$request->bank_name,
            "account_number"        =>$request->account_number,
            "opening_balance"       =>$request->opening_balance,
            "contact_number"        =>$request->contact_number,
            "bank_address"          =>$request->bank_address,

         ]);
            return back();

            }

            public  function AccountList(){
                return view('backend.pages.manageAccount.accountList');
            }

}
