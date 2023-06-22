<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;
use App\Models\ManageAccount;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ManageAccountsController extends Controller
{
    // Add Accounts

    public function addAccount(){


              $accounts = AccountType::all();
              return view('backend.pages.manageAccount.addAccount',compact('accounts'));
              }

             public function addAccountCreate(Request $request){

                //dd($request->all());

                 //Validation
                 $validator = Validator::make($request->all(), [
                'account_name' => 'required|string',
                'account_number' => 'required|unique:manage_accounts,account_number',
                'account_status' => 'required',

                 ]);

                 if ($validator->fails()) {
                    Alert::toast()->error('Something went wrog','error');
                    return redirect()->back()->withErrors($validator)->withInput();
                 }

                // Validation passed, create account
                // ManageAccount::create($request->all());


                //dd($request->all());

                ManageAccount::create([

                "account_name"             =>$request->account_name,
                "account_number"           =>$request->account_number,
                "account_status"           =>$request->account_status,
                "account_id"               =>$request->account_id

                ]);
                Alert::toast(' Success! Account Setup','success');
                return back();

                }
                  //Acount List Blade
                public  function AccountList(){

                    $accounts = ManageAccount::simplePaginate(10);
                    return view('backend.pages.manageAccount.accountList',compact('accounts'));
                }
                //Account Type Blade

                public function AccountType(){
                    return view('backend.pages.manageAccount.accountType');
                }

                //Account Type Create
                public function AccountTypeCreate(Request $request){

                    $validator = Validator::make($request->all(), [
                        'account_type' => 'required|unique:account_types,account_type',
                        'account_status' => 'required',
                    ]);

                    if ($validator->fails()) {
                        Alert::toast()->error('Something went wrog','error');
                        return redirect()->back()->withErrors($validator)->withInput();
                    }


               // dd($request->all());

                AccountType::create([

                "account_type" =>$request->account_type,
                "account_status" =>$request->account_status,
                ]);
                Alert::toast(' Success! Account Type Added','success');
                return redirect()->back();

                }

                public function AccountManageEdit($id){

                    //dd($id);

                    $accounts =AccountType::all();

                    $edit = ManageAccount::find($id);

                    return view('backend.pages.manageAccount.accountEdit',compact('edit','accounts'));

                }


                    }
