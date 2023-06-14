<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class ManageExpenseController extends Controller
{
    // Category Blade

    public function manageExpense(){
        return view('backend.pages.manageExpense.expenseCategory');
    }

    // Expense Type

    public function expenseTypeCreate(Request $request){

        dd($request->all());

        Categories::create([


            "expense_name"          =>$request->expense_name,
            "expense_type"          =>$request->expense_type,
            "expense_details"       =>$request->expense_details,

        ]);

    }


}
