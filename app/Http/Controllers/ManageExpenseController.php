<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\Categories;
use App\Models\Expense;
use Illuminate\Http\Request;
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
            'expense_name'       => 'required|string',
            'expense_type'       => 'required|string',
            'expense_details'    => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

          // dd($request->all());

           Categories::create([

            "expense_name"        =>$request->expense_name,
            "expense_type"        =>$request->expense_type,
            "expense_details"     =>$request->expense_details,

         ]);

          return back();

         }

            //Add Expense Form
           public function addExpense(){
            $transaction = AccountType::all();
            $expenses = Categories::all();
            return view('backend.pages.manageExpense.addExpenseForm',compact('expenses','transaction'));
           }
           public function ExpenseCreate(Request $request){

            //dd($request->all());
            //Validation

            $validator = Validator::make($request->all(), [
                'payable' => 'required',
                'expense_type' => 'required',
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
            "expense_type"        =>$request->expense_type,
            "item_name"           =>$request->item_name,
            "item_price"          =>$request->item_price,
            "item_quantity"       =>$request->item_quantity,
            "status"              =>$request->status,
            "expense_id"          =>$request->expense_id,
            "tansaction_account_id"=>$request->tansaction_account_id


         ]);
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


    //     foreach ($expenses as $expense) {
    //     if (strcasecmp($expense->status, 'Cash_In') === 0) {
    //         Cash_in: Deduct the item price from the total expense amount
    //         $totalExpenseAmount += $expense->item_price;
    //     } elseif (strcasecmp($expense->status, 'Cash_Out') === 0) {
    //          Cash_out: Add the item price to the total expense amount
    //         $totalExpenseAmount -= $expense->item_price;
    //     }
    // }

    // Retrieve account types
    $accountTypes = AccountType::all();
    return view('backend.pages.manageExpense.expenseList',compact('expenses','totalExpenseAmount', 'totalItemQuantity', 'accountTypes'));

}

}
