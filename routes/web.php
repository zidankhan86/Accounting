<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\LoanManageController;
use App\Http\Controllers\ManageExpenseController;
use App\Http\Controllers\ManageAccountsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Dashboard
Route::get('/',[HomeController::class,'home'])->name('home');

//Manage Account
Route::get('/add-account',[ManageAccountsController::class,'addAccount'])->name('add.account');
Route::post('/add-account-create',[ManageAccountsController::class,'addAccountCreate'])->name('add.account.create');
Route::get('/account-list',[ManageAccountsController::class,'AccountList'])->name('account.list');
Route::get('/account-type',[ManageAccountsController::class,'AccountType'])->name('account.type');
Route::post('/account-type-create',[ManageAccountsController::class,'AccountTypeCreate'])->name('account.type.create');
Route::get('/account-manage/edit/{id}',[ManageAccountsController::class,'AccountManageEdit'])->name('account.manage.edit');
Route::get('/account-manage/update/{id}',[ManageAccountsController::class,'AccountManageUpdate'])->name('account.manage.update');

//Manage Expense
Route::get('/add-expense-type',[ManageExpenseController::class,'manageExpense'])->name('manage.expense');
Route::post('/expense-type-create',[ManageExpenseController::class,'expenseTypeCreate'])->name('expense.type.create');
Route::get('/add-expense-form',[ManageExpenseController::class,'addExpense'])->name('add.expense');
Route::post('/expense-create',[ManageExpenseController::class,'ExpenseCreate'])->name('expense.create');
Route::get('/expense-list',[ManageExpenseController::class,'ExpenseList'])->name('expense.list');
Route::get('/expense-edit',[ManageExpenseController::class,'ExpenseEdit'])->name('expense.edit');

//Manage Loan
Route::get('/add-authorities',[LoanManageController::class,'addAuthorities'])->name('add.authorities');
Route::get('/authorities-list',[LoanManageController::class,'AuthoritiesList'])->name('authorities.list');
Route::post('/add-authorities-create',[LoanManageController::class,'addAuthoritiesCreate'])->name('add.authorities.create');
Route::get('/add-loan',[LoanManageController::class,'addLoan'])->name('add.loan');
Route::get('/add-type',[LoanManageController::class,'addType'])->name('add.loan.type');
Route::post('/add-type/create',[LoanManageController::class,'typeCreate'])->name('loan.type.create');
Route::get('/loan-list',[LoanManageController::class,'loanList'])->name('loan.list');

//Report
Route::get('/report',[ReportingController::class,'report'])->name('report');
