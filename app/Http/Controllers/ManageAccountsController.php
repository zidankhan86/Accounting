<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
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
                'account_name' => 'required|string',
                'account_type' => 'required|string',
                'account_number' => 'required|string',
                'account_status' => 'required',

                 ]);

                 if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                 }

                // Validation passed, create account
                // ManageAccount::create($request->all());


                //dd($request->all());

                ManageAccount::create([

                "account_name"             =>$request->account_name,
                "account_type"             =>$request->account_type,
                "account_number"           =>$request->account_number,
                "account_status"           =>$request->account_status,

                ]);
                return back();

                }
                  //Acount List Blade
                public  function AccountList(){

                    $accounts = ManageAccount::all();
                    return view('backend.pages.manageAccount.accountList',compact('accounts'));
                }
                //Account Type Blade

                public function AccountType(){
                    return view('backend.pages.manageAccount.accountType');
                }

                //Account Type Create
                public function AccountTypeCreate(Request $request){

                    $validator = Validator::make($request->all(), [
                        'account_name' => 'required',
                        'account_status' => 'required',
                    ]);

                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                    }


                //dd($request->all());

                AccountType::create([

                "account_name" =>$request->account_name,
                "account_status" =>$request->account_status,
                ]);

                return redirect()->back();

                }


                    }
