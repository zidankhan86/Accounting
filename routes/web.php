<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\LoanManageController;
use App\Http\Controllers\ManageExpenseController;
use App\Http\Controllers\ManageAccountsController;
use App\Http\Controllers\WebsiteController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//Fronted
Route::get('/',[WebsiteController::class,'website'])->name('website');
Route::get('/hero',[WebsiteController::class,'hero']);
Route::get('/package',[WebsiteController::class,'package']);
Route::get('/services',[WebsiteController::class,'services']);
Route::get('/contact',[WebsiteController::class,'contact']);
Route::get('/about',[WebsiteController::class,'about']);
//ajax post
Route::post('/contactStore',[WebsiteController::class,'contactStore']);

//Dashboard//Report
Route::get('/admin',[ReportingController::class,'report'])->name('report');
//Manage Account
Route::get('/add-account',[ManageAccountsController::class,'addAccount'])->name('add.account');
Route::post('/add-account-create',[ManageAccountsController::class,'AccountSetupCreate'])->name('add.account.create');
Route::get('/account-list',[ManageAccountsController::class,'AccountList'])->name('account.list');
Route::get('/account-type',[ManageAccountsController::class,'AccountType'])->name('account.type');
Route::get('/account-type-list',[ManageAccountsController::class,'AccountTypeList'])->name('account.type.list');
Route::get('/account-type-edit/{id}',[ManageAccountsController::class,'AccountTypeEdit'])->name('account.type.edit');
Route::get('/account-type-delete/{id}',[ManageAccountsController::class,'AccountTypeDelete'])->name('account.type.delete');
Route::post('/account-type-update/{id}',[ManageAccountsController::class,'AccountTypeUpdate'])->name('account.type.update');
Route::post('/account-type-create',[ManageAccountsController::class,'AccountTypeCreate'])->name('account.type.create');
Route::get('/account-manage/edit/{id}',[ManageAccountsController::class,'AccountManageEdit'])->name('account.manage.edit');
Route::post('/account-manage/update/{id}',[ManageAccountsController::class,'AccountManageUpdate'])->name('account.manage.update');
Route::get('/account-manage/delete/{id}',[ManageAccountsController::class,'AccountManageDelete'])->name('account.manage.delete');
//Manage Expense
Route::get('/add-expense-type',[ManageExpenseController::class,'manageExpense'])->name('manage.expense');
Route::post('/expense-type-create',[ManageExpenseController::class,'expenseTypeCreate'])->name('expense.type.create');
Route::get('/add-expense-form',[ManageExpenseController::class,'addExpense'])->name('add.expense');
Route::post('/expense-create',[ManageExpenseController::class,'ExpenseCreate'])->name('expense.create');
Route::get('/expense-edit/{id}',[ManageExpenseController::class,'ExpenseEdit'])->name('expense.edit');
Route::post('/expense-update/{id}',[ManageExpenseController::class,'ExpenseUpdate'])->name('expense.update');
Route::get('/expense-list',[ManageExpenseController::class,'ExpenseList'])->name('expense.list');
Route::get('/expense-invoice',[ManageExpenseController::class,'ExpenseInvoice'])->name('expense.invoice');
//Manage Loan
Route::get('/add-authorities',[LoanManageController::class,'addAuthorities'])->name('add.authorities');
Route::get('/authorities-list',[LoanManageController::class,'AuthoritiesList'])->name('authorities.list');
Route::post('/add-authorities-create',[LoanManageController::class,'addAuthoritiesCreate'])->name('add.authorities.create');
Route::get('/add-loan',[LoanManageController::class,'addLoan'])->name('add.loan');
Route::post('/loan-create',[LoanManageController::class,'Loancreate'])->name('loan.create');
Route::get('/loan-edit/{$id}',[LoanManageController::class,'loanEdit'])->name('loan.edit');
Route::get('/add-type',[LoanManageController::class,'addType'])->name('add.loan.type');
Route::post('/add-type/create',[LoanManageController::class,'typeCreate'])->name('loan.type.create');
Route::get('/loan-list',[LoanManageController::class,'loanList'])->name('loan.list');
Route::get('/loan-payment',[LoanManageController::class,'loanPayment'])->name('loan.payment');
Route::post('/loan-payment-create',[LoanManageController::class,'loanPaymentCreate'])->name('loan.payment.create');


