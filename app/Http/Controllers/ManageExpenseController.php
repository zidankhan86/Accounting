<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManageExpenseController extends Controller
{
    // Category Blade

    public function manageExpense(){
        return view('backend.pages.manageExpense.expenseCategory');
    }

    // Expense Type

        public function expenseTypeCreate(Request $request){

         //validation

        $validator = Validator::make($request->all(), [
            'expense_name' => 'required|string',
            'expense_type' => 'required|string',
            'expense_details' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       // dd($request->all());

        Categories::create([


            "expense_name"          =>$request->expense_name,
            "expense_type"          =>$request->expense_type,
            "expense_details"       =>$request->expense_details,


        ]);

        return back();

    }


}
