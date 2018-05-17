<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'date', 'description', 'hourlyRate', 'hourNumbre', 'HTAmount', 'TTCAmount', 'TVA',
    ];
}
