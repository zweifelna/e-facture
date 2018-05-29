<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\models\Customer;
use App\models\Category;

class CustomerController extends Controller
{

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('customers.create', compact('categories'));
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
            'category_id' => $request->category_id,
        ]);

        $customers = Customer::all();
		return view('customers.index', compact('customers'));
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
    public function edit($id)
    {
        $customer = Customer::find($id);
        $categories = Category::pluck('name', 'id');

        return view('customers.update', compact('customer', 'categories'));
    }

    /**
     * Customer's update with request's datas
     */
    public function update(CustomerRequest $request)
    {
        /** Change the datas */
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
        $customer->category_id = $request->category_id;
        $customer->save();
        
        /**Get the infos to show customer's details */
        $customer = Customer::find($request->id);
        $categories = Category::pluck('name', 'id');
        return view('customers.update', compact('customer', 'categories'));
    }
    
    /**
     * Delete the customer
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return back();

    }
}
