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

             public function AccountSetupCreate(Request $request){

                //dd($request->all());

                 //Validation
                 $validator = Validator::make($request->all(), [
                'account_name' => 'required|string',
                'account_number' => 'required|unique:manage_accounts,account_number',
                'status' => 'required',

                 ]);

                 if ($validator->fails()) {
                    Alert::toast()->error('Something went wrog','error');
                    return redirect()->back()->withErrors($validator)->withInput();
                 }

                // Validation passed, create account



                //dd($request->all());

                ManageAccount::create([

                "account_name"             =>$request->account_name,
                "account_number"           =>$request->account_number,
                "status"                   =>$request->status,
                "account_type_id"           =>$request->account_type_id

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
                        'status' => 'required',
                    ]);

                    if ($validator->fails()) {
                        Alert::toast()->error('Something went wrog','error');
                        return redirect()->back()->withErrors($validator)->withInput();
                    }


               // dd($request->all());

                AccountType::create([

                "account_type" =>$request->account_type,
                "status" =>$request->status,
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

            public function AccountManageUpdate(Request $request ,$id){
                $validator = Validator::make($request->all(), [
                    'account_name' => 'required|string',
                    'account_number' => 'required',
                    'status' => 'required',

                     ]);

                     if ($validator->fails()) {
                        Alert::toast()->error('Something went wrong','error');
                        return redirect()->back()->withErrors($validator)->withInput();
                     }

                //dd($request->all());
                $update = ManageAccount::find($id);
                $update->update([

                    "account_name"             =>$request->account_name,
                    "account_number"           =>$request->account_number,
                    "status"                   =>$request->status,
                    "account_type_id"           =>$request->account_type_id

                ]);

                Alert::toast()->success('Account Updated Successfully');
                return redirect()->back();

            }

            public function AccountManageDelete($id){
                $delete = ManageAccount::find($id)->delete();
                return back();
            }
            public function AccountTypeEdit($id){

                $accountType = AccountType::find($id);
                return view('backend.pages.manageAccount.accountTypeEdite',compact('accountType'));
            }

            public function AccountTypeList(){

                $accountType = AccountType::simplePaginate(10);
                return view('backend.pages.manageAccount.accountTypeList',compact('accountType'));
            }

            public function AccountTypeUpdate(Request $request,$id){
                $update = AccountType::find($id);
                $update->update([
                    "account_type" =>$request->account_type,
                    "status" =>$request->status,

                ]);
                Alert::toast()->success('Account Type Updated Successfully');
                return back();
            }

                    }
