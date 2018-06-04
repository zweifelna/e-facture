<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\models\Customer;
use App\models\Category;
use Validator;

class CustomerController extends Controller
{

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('customers.create', compact('categories'));
    }

    /**Store the customer in the database */
    public function store(CustomerRequest $request)
    {
        /**Test the request datas */
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'firstName' => 'required|max:30',
            'company' => 'required|max:30',
            'address' => 'required|max:60',
            'city' => 'required|max:30',
            'postalCode' => 'required|digits:4',
            'email' => 'required|email',
            'phone' => 'digits_between:0,10',
            'mobilePhone' => 'digits_between:0,10',
            'fax' => 'digits_between:0,10',
            'category_id' => 'required:digits:1',
        ]);

        /**If one or more tests fail, return an error */
        if ($validator->fails()) {
            return redirect('customers/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        /**Create the customer */
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

        return view('customers.edit', compact('customer', 'categories'));
    }

    /**
     * Customer's update with request's datas
     */
    public function update(CustomerRequest $request)
    {
        /**Test the request datas */
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'firstName' => 'required|max:30',
            'company' => 'required|max:30',
            'address' => 'required|max:60',
            'city' => 'required|max:30',
            'postalCode' => 'required|digits:4',
            'email' => 'required|email',
            'phone' => 'digits_between:0,10',
            'mobilePhone' => 'digits_between:0,10',
            'fax' => 'digits_between:0,10',
            'category_id' => 'required:digits:1',
        ]);

        /**If one or more tests fail, return an error */
        if ($validator->fails()) {
            return redirect('customers/create')
                        ->withErrors($validator)
                        ->withInput();
        }

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
        return view('customers.edit', compact('customer', 'categories'));
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
