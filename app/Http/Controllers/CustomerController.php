<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\models\Customer;

class CustomerController extends Controller
{

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request)
    {
        Customer::create([
            'name' => $request->name,
            'firstName' => $request->firstName,
            'company' => $request->company,
            'address' => $request->address,
            'city' => $request->city,
            'postalCode' => $request->postalCode,
            'email' => $request->email,
            'phone' => $request->phone,
            'mobilePhone' => $request->mobilePhone,
            'fax' => $request->fax,
            'category' => $request->category,
        ]);
		return back();
    }

    /**
     * Return all the customers
     */
    public function index()
	{

        $customers = Customer::all();

		return view('customers.index', compact('customers'));
    }

    
}
