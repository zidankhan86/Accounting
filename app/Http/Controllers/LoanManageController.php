<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanType;
use App\Models\Authorities;
use App\Models\LoanPayment;
use Illuminate\Http\Request;
use App\Models\ManageAccount;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
            Alert::toast()->error('Failed to add authorities ');
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


        $loans = Loan::with('authority','AccountName')->get();
        $authorities=Authorities::all();
        $accounts = ManageAccount::all();
       // $accountName =


        return view('backend.pages.manageLoan.loanList',compact('loans','authorities','accounts'));
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
            'duration' => 'nullable',
            'per_month' => 'nullable',
            'note' => 'nullable',
            'loan_amount' => 'required|numeric|min:0',
            'name'=>'required'
        ]);

        if ($validator->fails()) {
            Alert::toast()->error('Failed to loan add','Failed!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //dd($request->all());
        $loanAmount = $request->loan_amount;
        $interestRate = $request->interest;

        $interest = $this->calculateInterest($loanAmount, $interestRate);
        $existingLoan = Loan::where('account_number', $request->account_number)->first();

        if ($existingLoan) {
            // Update the existing loan's loan_amount by adding the new loan_amount
            $existingLoan->loan_amount += $loanAmount;
            $existingLoan->save();} else {

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
        "account_number"=>$request->account_number,
        "name"=>$request->name,
        ]);
    }
         Alert::toast()->success('Loan Added');
         return back();

    }
    private function calculateInterest($loanAmount, $interestRate)
    {
        return ($loanAmount * $interestRate) / 100;
    }

    public function loanPayment(){

        $accountName = ManageAccount::leftJoin('expenses', 'expenses.expense_type_id', 'manage_accounts.id')
        ->select('manage_accounts.id as id',
        'manage_accounts.account_name as account_name',
        DB::raw('SUM(CASE WHEN expenses.status = 1 THEN expenses.item_price ELSE 0 END) as income'),
        DB::raw('SUM(CASE WHEN expenses.status = 0 THEN expenses.item_price ELSE 0 END) as expense')
         )
        ->groupBy('id', 'account_name')
        ->get();

        $accounts = ManageAccount::all();
        $authorities = Authorities::all();
        $loan = Loan::all();
        $loanAmount = LoanPayment::all();

        //dd($accounts);
        return view('backend.pages.manageLoan.loanPayment',compact('loanAmount','accounts','authorities','accountName','loan'));
    }

    public function loanPaymentCreate(Request $request){
       // dd($request->all());
        $validator = Validator::make($request->all(), [


        'Account_name_id' => 'required',
        'Authorities_name_id' => 'required',
        'loan_id' => 'required',
        'loan_amount' => 'required|numeric|min:0',
        'loan_payment' => 'required|numeric|min:0',
        'date'=>'required|date|after_or_equal:today',
        'status' => 'required',
        'note' => 'nullable',
        'balance' => 'required|numeric|min:0',
        'account_number' => 'required',
        'name' => 'required',


        ]);

        if($validator->fails()){
            Alert::toast()->error('Something went wrong','Failed!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

       // dd($request->all());
       $loan = Loan::where('account_number', $request->account_number)->first();

       if (!$loan) {

        return redirect()->back()->with('error', 'No matching loan found for the selected account number');
    }

    // Calculate the new loan amount after deducting the payment
    $newLoanAmount = $loan->loan_amount - $request->loan_payment;

    if ($newLoanAmount < 0) {
        Alert::toast()->error('Insufficient Balance: Payment exceeds available balance');
        return redirect()->back();
    }

    // Update the loan amount in the Loan model
    $loan->update(['loan_amount' => $newLoanAmount]);
  //dd($request->all());

        LoanPayment::create([

            "Account_name_id" =>$request->Account_name_id,
            "Authorities_name_id" =>$request->Authorities_name_id,
            "loan_id" =>$request->loan_id,
            "expense_id" =>$request->expense_id,
            "loan_amount" =>$request->loan_amount,
            "loan_payment" =>$request->loan_payment,
            "date" =>$request->date,
            "status" =>$request->status,
            "note" =>$request->note,
            "balance" =>$request->balance,
            "account_number" =>$request->account_number,
            "name" =>$request->name,

        ]);
         // Deduct the payment amount from the corresponding loan


    Alert::toast()->success('Loan Payment Added');

        return redirect()->back();
    }




}
