<?php

namespace App\Http\Controllers;

use App\Models\Authorities;
use App\Models\LoanType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoanManageController extends Controller
{
    public function addAuthorities(){
        return view('backend.pages.manageLoan.authorities');
    }

    public function addAuthoritiesCreate(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authorities|max:255',
            'number' => 'required|string|max:255',
            'cash_limit' => 'required|numeric',
            'address' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            // Redirect or return the validation errors to the user
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //dd($request->all());

        Authorities::create([

            "name" =>$request->name,
            "email" =>$request->email,
            "number" =>$request->number,
            "cash_limit" =>$request->cash_limit,
            "address" =>$request->address,
            "status" =>$request->status,
            "note" =>$request->note,


        ]);

       Alert::toast('Authorities Added!','success');



        return back();

    }

    public function addLoan(){
        return view('backend.pages.manageLoan.addLoan');
    }

    public function addType(){
        return view('backend.pages.manageLoan.loanType');
    }

    public function typeCreate(Request $request){

        //dd($request->all());

        LoanType::create([

            "loan_type"=>$request->loan_type,
            "status"=>$request->status

        ]);

        Alert::toast('Loan type added','success');
        return back();

    }
}
