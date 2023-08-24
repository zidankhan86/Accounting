<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded = [];


     public function ExpenseType(){

    return $this->belongsTo(Categories::class,'expense_id','id');
}

     public function transactionAccount()
    {
        return $this->belongsTo(AccountType::class, 'expense_type_id', 'id');
    }

    public function expenseDetails(){
        return $this->hasMany(ExpenseDetails::class,'expense_id','id');
    }
}
