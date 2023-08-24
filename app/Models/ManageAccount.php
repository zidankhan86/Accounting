<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManageAccount extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function AccountSetup(){
        return $this->belongsTo(AccountType::class,'account_type_id','id');
    }
    /**
     * Get all of the comments for the ManageAccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function balance(): HasMany
    {
        return $this->hasMany(Expense::class, 'expense_type_id', 'id');
    }
}
