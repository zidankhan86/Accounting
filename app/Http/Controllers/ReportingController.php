<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\ManageAccount;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ReportingController extends Controller
{
    public function report(){
        $income = Expense::where('status',true)->get();
        $expense = Expense::where('status',false)->get();
        $from = Carbon::parse(sprintf(
            '%s-%s-01',
            request()->query('y', Carbon::now()->year),
            request()->query('m', Carbon::now()->month)
        ));


        $to      = clone $from;
        $to->day = $to->daysInMonth;
        if(request()->query('entity') == '0'){
            $expenses = Expense::whereBetween('created_at', [$from, $to])->where('status',false)->get();
            $sum = $expenses->sum('amount');
        }elseif(request()->query('entity') == '1'){
            $expenses = Expense::whereBetween('created_at', [$from, $to])->where('status',true)->get();
            $sum = $expenses->sum('amount');
        }else{
            $expenses = Expense::whereBetween('created_at', [$from, $to])->get();
            $sum = $expenses->sum('amount');
        }
        if($expenses->count() > 0){
            Alert::toast()->success('Generated report');
        }else{
            Alert::toast()->error('No expense has been on this report month');
        }
        // $accounts = AccountSetup::with('transaction')->get();
        $accounts = ManageAccount::simplePaginate(8);
        
        $account = ManageAccount::with('AccountSetup')->get();
        return view('backend.pages.report.report',compact('accounts','expenses','account'));
    }
}
