<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageAccountsController;
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

Route::get('/add-account',[ManageAccountsController::class,'addAccount'])->name('add.account');
Route::post('/add-account-create',[ManageAccountsController::class,'addAccountCreate'])->name('add.account.create');
Route::get('/account-list',[ManageAccountsController::class,'AccountList'])->name('account.list');
