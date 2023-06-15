<?php

namespace App\Http\Controllers;

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
            return view('backend.pages.manageExpense.addExpenseForm');
        }
        public function ExpenseCreate(Request $request){
        //Add Expense Create

        //dd($request->all());
        Expense::create([

        "payable" =>$request->payable,
        "expense_account" =>$request->expense_account,
        "expense_details" =>$request->expense_details,
        "item_name" =>$request->item_name,
        "item_price" =>$request->item_price,
        "item_quantity" =>$request->item_quantity,
        "status" =>$request->status,


     ]);
     return redirect()->back();

}





}
