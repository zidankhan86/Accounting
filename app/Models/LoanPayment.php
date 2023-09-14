<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanPayment extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the LoanPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function LoanAccount(): BelongsTo
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }
}
