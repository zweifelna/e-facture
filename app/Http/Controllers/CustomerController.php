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


    /**
     * Return customer's details
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return view('customers.show', compact('customer'));
    }

    /**
     * Customer's update with request's datas
     */
    public function update(CustomerRequest $request)
    {
        /** Modifie l'entrée */
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->firstName = $request->firstName;
        $customer->company = $request->company;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->postalCode = $request->postalCode;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->mobilePhone = $request->mobilePhone;
        $customer->fax = $request->fax;
        $customer->category = $request->category;
        $customer->save();
        
        /**Récupère les infos pour afficher l'image en détail */
        $customer = Customer::find($request->id);
        return view('customers.show', compact('customer'));
    }
    
}
