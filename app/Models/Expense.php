<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'Title',
        'Amount',
        'Category',
        'Date',
        'payement_method'
    ];
}
