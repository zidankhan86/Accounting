<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountType extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the comments for the AccountType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function AccountType(): HasMany
    {
        return $this->hasMany(Comment::class, 'id', 'id');
    }
}
