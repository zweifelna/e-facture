<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Customer;

class CustomerController extends Controller
{

    /**
     * Return all the customers
     */
    public function index()
	{

        $customers = Customer::all();

		return view('customers.index', compact('customers'));
    }

    
}
