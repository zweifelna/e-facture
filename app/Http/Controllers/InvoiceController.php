<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use App\models\Invoice;
use App\models\Customer;
use App\models\Status;
use App\models\Service;

class InvoiceController extends Controller
{

    public function create()
    {
        $statuses = Status::pluck('description', 'id');
        $customers = Customer::pluck('name', 'id');
        return view('invoices.create', compact('statuses', 'customers'));
    }

    public function store(InvoiceRequest $request)
    {
        Invoice::create([
            'limitDate' => $request->limitDate,
            'HTAmount' => $request->HTAmount,
            'TTCAmount' => $request->TTCAmount,
            'TVA' => $request->TVA,
            'customer_id' => $request->customer_id,
            'status_id' => $request->status_id,
        ]);

        $statuses = Status::pluck('description', 'id');
        $customers = Customer::pluck('name', 'id');
        $invoices = DB::table('invoices')
            ->leftjoin('statuses', 'statuses.id', '=', 'invoices.status_id')
            ->leftjoin('customers', 'invoices.customer_id', '=', 'customers.id')
            ->get();
            
		return view('invoices.index', compact('invoices', 'customers'));
    }

    /**
     * Return all the customers
     */
    public function index()
	{

        $invoices = DB::table('invoices')
        ->leftjoin('statuses', 'statuses.id', '=', 'invoices.status_id')
        ->leftjoin('customers', 'invoices.customer_id', '=', 'customers.id')
        ->get();

		return view('invoices.index', compact('invoices'));
    }


    /**
     * Return customer's details
     */
    public function show($id)
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
        $customer->category_id = $request->category_id;
        $customer->save();
        
        /**Récupère les infos pour afficher le client en détail */
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
