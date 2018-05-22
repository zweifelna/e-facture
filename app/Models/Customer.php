<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstName', 'company', 'address', 'city', 'postalCode', 'email', 'phone', 'mobilePhone', 'fax', 'category',
    ];
}
