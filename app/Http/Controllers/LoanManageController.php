<?php

namespace App\Http\Controllers;

use App\Models\Authorities;
use App\Models\Loan;
use App\Models\LoanType;
use App\Models\ManageAccount;
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

       Alert::toast()->success('Authorities Added');



        return back();

    }

    public function addLoan(){


        $authorities = Authorities::all();

        $loanTypes = LoanType::all();

        $accounts = ManageAccount::all();

        return view('backend.pages.manageLoan.addLoan',compact('authorities','loanTypes','accounts'));
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

    public function AuthoritiesList(){
        $authors = Authorities::simplePaginate(10);
        return view('backend.pages.manageLoan.authorList',compact('authors'));
    }

    public function loanList(){

        // $authors = Authorities::simplePaginate(10);

        return view('backend.pages.manageLoan.loanList');
    }

    //Loan Create

    public function Loancreate(Request $request){

        $validator = Validator::make($request->all(), [
            'loan_type_id' => 'required',
            'Authorities_name_id' => 'required',
            'Account_name_id' => 'required',
            'loan_reasion' => 'required',
            'reference' => 'required',
            'interest' => 'required',
            'payment_type' => 'required',
            'duration' => 'required',
            'per_month' => 'required',
            'note' => 'required',
            'loan_amount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            Alert::toast()->error('Failed to loan add','Failed!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //dd($request->all());
        $loanAmount = $request->loan_amount;
        $interestRate = $request->interest;

        $interest = $this->calculateInterest($loanAmount, $interestRate);

        Loan::create([

        "loan_type_id"=>$request->loan_type_id,
        "Authorities_name_id"=>$request->Authorities_name_id,
        "Account_name_id"=>$request->Account_name_id,
        "loan_reasion"=>$request->loan_reasion,
        "reference"=>$request->reference,
        "interest"=>$request->interest,
        "interest" => $interest, // Calculate the interest here
        "payment_type"=>$request->payment_type,
        "duration"=>$request->duration,
        "per_month"=>$request->per_month,
        "note"=>$request->note,
        "loan_amount"=>$request->loan_amount,

        ]);

         Alert::toast()->success('Loan Added');
         return back();

    }
    private function calculateInterest($loanAmount, $interestRate)
    {
        return ($loanAmount * $interestRate) / 100;
    }

}
