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
        'customer_id', 'limitDate', 'description', 'hourlyRate', 'hourNumbre', 'HTAmount', 'TTCAmount', 'TVA', 'customer_id', 'status_id'
    ];
}
