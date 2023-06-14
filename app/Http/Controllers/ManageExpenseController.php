<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageExpenseController extends Controller
{
    public function manageExpense(){
        return view('backend.pages.manageExpense.expenseCategory');
    }
}
