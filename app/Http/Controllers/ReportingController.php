<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\ManageAccount;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReportingController extends Controller
{
   


        public function report(Request $request)
        {
            $from = Carbon::parse(sprintf(
                '%s-%s-01',
                $request->query('y', Carbon::now()->year),
                $request->query('m', Carbon::now()->month)
            ));

            $to = clone $from;
            $to->day = $to->daysInMonth;

            $expensesQuery = Expense::whereBetween('created_at', [$from, $to]);

            $entity = $request->query('entity');
            if ($entity == '0') {
                $expensesQuery->where('status', false);
            } elseif ($entity == '1') {
                $expensesQuery->where('status', true);
            }

            $expenses = $expensesQuery->get();
            $sum = $expenses->sum('amount');

            if ($expenses->count() > 0) {
                Alert::toast()->success('Generated report');
            } else {
                Alert::toast()->error('No expenses for this report month');
            }

            $accounts = ManageAccount::simplePaginate(8);

            $accountName = ManageAccount::leftJoin('expenses', 'expenses.expense_type_id', 'manage_accounts.id')
                ->select('manage_accounts.id as id',
                    'manage_accounts.account_name as account_name',
                    DB::raw('SUM(CASE WHEN expenses.status = 1 THEN expenses.item_price ELSE 0 END) as income'),
                    DB::raw('SUM(CASE WHEN expenses.status = 0 THEN expenses.item_price ELSE 0 END) as expense')
                )
                ->groupBy('id', 'account_name')
                ->get();

            $accountBalances = [];
            foreach ($accountName as $expense) {
                $balance = $expense->income - $expense->expense;
                $accountBalances[$expense->id] = $balance;
            }

            return view('backend.pages.report.report', compact('accounts', 'expenses', 'accountName', 'accountBalances'));
        }
}
