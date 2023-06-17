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

            $expenses = Categories::all();
            return view('backend.pages.manageExpense.addExpenseForm',compact('expenses'));
           }
           public function ExpenseCreate(Request $request){

            //dd($request->all());
            //Validation

            $validator = Validator::make($request->all(), [
                'payable' => 'required',
                'expense_account' => 'required',
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
            "expense_account"     =>$request->expense_account,
            "expense_type"        =>$request->expense_type,
            "item_name"           =>$request->item_name,
            "item_price"          =>$request->item_price,
            "item_quantity"       =>$request->item_quantity,
            "status"              =>$request->status,
            "expense_id"          =>$request->expense_id


         ]);
         return redirect()->back();

}

public function ExpenseList(){

    $expenses = Expense::simplePaginate(10);
    return view('backend.pages.manageExpense.expenseList',compact('expenses'));
}





}
