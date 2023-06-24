<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Categories;
use App\Models\AccountType;
use App\Models\ManageAccount;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ManageExpenseController extends Controller
{
        // Category Form

        public function manageExpense(){
        return view('backend.pages.manageExpense.expenseCategory');
        }

        // Expense Type Create

        public function expenseTypeCreate(Request $request){

         //validation

        $validator = Validator::make($request->all(), [
            'status'       => 'required|string',
            'expense_type'       => 'required|string',
            'expense_details'    => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

          // dd($request->all());

           Categories::create([

            "status"        =>$request->status,
            "expense_type"        =>$request->expense_type,
            "expense_details"     =>$request->expense_details,

         ]);
         Alert::toast(' Success! Expense Type Added','success');
          return back();

         }

            //Add Expense Form

            public function addExpense(){
            $accountName = ManageAccount::all();
            $transaction = AccountType::all();
            $expenses = Categories::all();
            return view('backend.pages.manageExpense.addExpenseForm',compact('expenses','transaction','accountName'));
           }
           public function ExpenseCreate(Request $request){

            //dd($request->all());
            //Validation

            $validator = Validator::make($request->all(), [
                'payable' => 'required',
                'item_name' => 'required',
                'item_price' => 'required|numeric|min:0',
                'item_quantity' => 'required|integer|min:1',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        //Add Expense Create

           // dd($request->all());
            Expense::create([

            "payable"             =>$request->payable,
            "item_name"           =>$request->item_name,
            "item_price"          =>$request->item_price,
            "item_quantity"       =>$request->item_quantity,
            "status"              =>$request->status,
            "expense_id"          =>$request->expense_id,
            "transaction_type_id"=>$request->transaction_type_id


         ]);
         Alert::toast(' Success! Expense Added','success');
         return redirect()->back();

}

public function ExpenseList(){

     //Calculate total expense amount and total item quantity
     $totalExpenseAmount = Expense::sum('item_price');
     $totalItemQuantity = Expense::sum('item_quantity');

     //Perform any other accounting calculations or operations here


     //Retrieve account types
     $accountTypes = AccountType::all();

     //Return the data to the view or perform any other actions

       $expenses = Expense::simplePaginate(10);


        foreach ($expenses as $expense) {
        if (strcasecmp($expense->status, 'Cash In') === 0) {
            //Cash_in: Deduct the item price from the total expense amount
            $totalExpenseAmount += $expense->item_price;
        } elseif (strcasecmp($expense->status, 'Cash Out') === 0) {
             //Cash_out: Add the item price to the total expense amount
            $totalExpenseAmount -= $expense->item_price;
        }
    }

    // Retrieve account types
    $accounts=Categories::all();
    $accountTypes = AccountType::all();
    return view('backend.pages.manageExpense.expenseList',compact('expenses','totalExpenseAmount', 'totalItemQuantity', 'accountTypes','accounts'));

}

}
