<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Categories;
use App\Models\AccountType;
use Illuminate\Http\Request;
use App\Models\ManageAccount;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ManageExpenseController extends Controller
{
        // Category Form

         public function manageExpense(){
          return view('backend.pages.manageExpense.expenseCategory');
        }

         // Expense Type Create

        public function expenseTypeCreate(Request $request){

            try {
                // Validation
                $validator = Validator::make($request->all(), [

                    'expense_type' => 'required|string',
                    'expense_details' => 'required|string',
                ]);

                if ($validator->fails()) {
                    throw new ValidationException($validator);
                }

                // Create a new expense type
                Categories::create([
                    "status" => $request->status,
                    "expense_type" => $request->expense_type,
                    "expense_details" => $request->expense_details,
                ]);

                return response()->json(['message' => 'Expense type added successfully']);
            } catch (\Exception $e) {
                // Handle exceptions here, e.g., log the error or return an error response
                return response()->json(['error' => 'An error occurred while adding the expense type'], 500);
            }
        }

        //Add Expense Form

        public function addExpense(){

        //Expense Calculation
        $accountName = ManageAccount::leftJoin('expenses', 'expenses.expense_type_id', 'manage_accounts.id')
        ->select('manage_accounts.id as id',
        'manage_accounts.account_name as account_name',
        DB::raw('SUM(CASE WHEN expenses.status = 1 THEN expenses.item_price ELSE 0 END) as income'),
        DB::raw('SUM(CASE WHEN expenses.status = 0 THEN expenses.item_price ELSE 0 END) as expense')
         )
        ->groupBy('id', 'account_name')
        ->get();
        // return $accountName;
        $transaction = AccountType::all();
        $expenses = Categories::all();
        return view('backend.pages.manageExpense.addExpenseForm',compact('expenses','transaction','accountName'));
        }
        public function ExpenseCreate(Request $request){
            try {
                // Validation
                $validator = Validator::make($request->all(), [
                    'payable'  => 'required',
                    'item_name' => 'required',
                    'item_price' => 'required|numeric|min:0',
                    'quanity' => 'required|integer|min:1',
                    'status' => 'required',
                    'date' =>'required|date|after_or_equal:today',
                    'expense_type_id'=>'required',
                    'note'=>'nullable'
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $selectedAccount = ManageAccount::findOrFail($request->expense_type_id);

                $income = $selectedAccount->balance->where('status', 1)->sum('item_price');
                $expense = $selectedAccount->balance->where('status', 0)->sum('item_price');

                if ($request->status == 1) {
                    $balanceChange = $request->item_price;
                } else {
                    $balanceChange = -$request->item_price;
                }

                $balance = $income - $expense + $balanceChange;

                // Create the expense record
                Expense::create([
                    "payable" => $request->payable,
                    "item_name" => $request->item_name,
                    "item_price" => $request->item_price,
                    "quanity" => $request->quanity,
                    "status" => $request->status,
                    "expense_id" => $request->expense_id,
                    "expense_type_id" => $request->expense_type_id,
                    "amount" => $balance,
                    "account_name" => $selectedAccount->account_name,
                    "account_number" => $selectedAccount->account_number,
                    "date" => $request->date,
                    "note" => $request->note
                ]);

                Alert::toast('Success! Expense Added', 'success');
                return redirect()->back();
            } catch (\Exception $e) {
                // Handle any exceptions that occur during the process
                // You can log the error, display a custom error message, or redirect to an error page
                // Example: Log::error($e->getMessage());
                Alert::toast('Error! An error occurred while adding the expense', 'error');
                return redirect()->back();
            }
        }


        public function ExpenseList(){

        //Calculate total expense amount and total item quantity
        $totalExpenseAmount = Expense::sum('item_price');



        //Retrieve account types
         $accountTypes = AccountType::all();

        //Return the data to the view

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
        return view('backend.pages.manageExpense.expenseList',compact('expenses','totalExpenseAmount', 'accountTypes','accounts'));

}

        public function ExpenseInvoice(){
            return view('backend.pages.manageExpense.expenseInvoice');
        }

        public function ExpenseEdit( $id){

             //Expense Calculation
        $accountName = ManageAccount::leftJoin('expenses', 'expenses.expense_type_id', 'manage_accounts.id')
        ->select('manage_accounts.id as id',
        'manage_accounts.account_name as account_name',
        DB::raw('SUM(CASE WHEN expenses.status = 1 THEN expenses.item_price ELSE 0 END) as income'),
        DB::raw('SUM(CASE WHEN expenses.status = 0 THEN expenses.item_price ELSE 0 END) as expense')
         )
        ->groupBy('id', 'account_name')
        ->get();
        // return $accountName;
        $transaction = AccountType::all();
        $expenses = Categories::all();
        $edit = Expense::find($id);

            return view('backend.pages.manageExpense.expenseEdit',compact('edit','expenses','transaction','accountName'));

        }

        public function ExpenseUpdate(Request $request,$id){

            $validator = Validator::make($request->all(), [
                'payable'  => 'required',
                'item_name' => 'required',
                'item_price' => 'required',
                'quanity' => 'required',
                'status' => 'required',
                'date' =>'required',
                'expense_type_id'=>'required',
                'note'=>'nullable'

                 ]);

                if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
                }

                $selectedAccount = ManageAccount::findOrFail($request->expense_type_id);

                $income = $selectedAccount->balance->where('status', 1)->sum('item_price');
                $expense = $selectedAccount->balance->where('status', 0)->sum('item_price');

                if ($request->status == 1) {
                    $balanceChange = $request->item_price;
                } else {
                    $balanceChange = -$request->item_price;
                }

                $balance = $income - $expense + $balanceChange;

              // dd($request->all());
            $update = Expense::find($id);
            $update->update([


        "payable"             =>$request->payable,
        "item_name"           =>$request->item_name,
        "item_price"          =>$request->item_price,
        "quanity"             =>$request->quanity,
        "status"              =>$request->status,
        "expense_id"          =>$request->expense_id,
        "expense_type_id"=>$request->expense_type_id,
        "amount"  => $balance ,
        "account_name" => $selectedAccount->account_name,
        "account_number"=>$selectedAccount->account_number,
        "date"=>$request->date,
        "note"=>$request->note
            ]);
            Alert::toast(' Success! Expense Updated');
            return back();
        }

        public function ExpenseView($id){
            //Expense Calculation
        $accountName = ManageAccount::leftJoin('expenses', 'expenses.expense_type_id', 'manage_accounts.id')
        ->select('manage_accounts.id as id',
        'manage_accounts.account_name as account_name',
        DB::raw('SUM(CASE WHEN expenses.status = 1 THEN expenses.item_price ELSE 0 END) as income'),
        DB::raw('SUM(CASE WHEN expenses.status = 0 THEN expenses.item_price ELSE 0 END) as expense')
         )
        ->groupBy('id', 'account_name')
        ->get();
        // return $accountName;
        $transaction = AccountType::all();
        $expenses = Categories::all();
        $view = Expense::find($id);
            return view('backend.pages.manageExpense.singleviewExpense',compact('view','expenses','transaction','accountName'));
        }

}
