<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageAccount extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function AccountSetup(){
        return $this->belongsTo(AccountType::class,'account_type_id','id');
    }
}
