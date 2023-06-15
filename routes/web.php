<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageAccountsController;
use App\Http\Controllers\ManageExpenseController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'home'])->name('home');
//Manage Account
Route::get('/add-account',[ManageAccountsController::class,'addAccount'])->name('add.account');
Route::post('/add-account-create',[ManageAccountsController::class,'addAccountCreate'])->name('add.account.create');
Route::get('/account-list',[ManageAccountsController::class,'AccountList'])->name('account.list');
Route::get('/account-type',[ManageAccountsController::class,'AccountType'])->name('account.type');
Route::post('/account-type-create',[ManageAccountsController::class,'AccountTypeCreate'])->name('account.type.create');


//Manage Expense
Route::get('/add-expense-type',[ManageExpenseController::class,'manageExpense'])->name('manage.expense');
Route::post('/expense-type-create',[ManageExpenseController::class,'expenseTypeCreate'])->name('expense.type.create');
Route::get('/add-expense-form',[ManageExpenseController::class,'addExpense'])->name('add.expense');
Route::post('/expense-create',[ManageExpenseController::class,'ExpenseCreate'])->name('expense.create');

