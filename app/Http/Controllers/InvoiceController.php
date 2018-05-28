<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\ServiceRequest;
use App\models\Invoice;
use App\models\Customer;
use App\models\Status;
use App\models\Service;

class InvoiceController extends Controller
{
    /**
     * Return invoice's creation view
     */
    public function create()
    {
        $statuses = Status::pluck('description', 'id');
        $customers = Customer::pluck('name', 'id');
        return view('invoices.create', compact('statuses', 'customers'));
    }

    /**
     * Store the invoice in the database
     */
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

        $invoices = DB::table('invoices')
            ->leftjoin('statuses', 'statuses.id', '=', 'invoices.status_id')
            ->leftjoin('customers', 'invoices.customer_id', '=', 'customers.id')
            ->get();
            
		return view('invoices.index', compact('invoices'));
    }

    /**
     * Store a new invoice's service in the database
     */
    public function addService(ServiceRequest $request)
    {

        $htAmount = $request->hourNumber * $request->hourlyRate;
        $tvaAmount = $htAmount * $request->TVA;
        $ttcAmount = $htAmount + $tvaAmount;

        Service::create([
            'description' => $request->description,
            'hourNumber' => $request->hourNumber,
            'hourlyRate' => $request->hourlyRate,
            'HTAmount' => $htAmount,
            'TTCAmount' => $ttcAmount,
            'TVA' => $request->TVA,
            'TVAmount' => $tvaAmount,
            'invoice_id' => $request->invoice_id,
        ]);

        $services = Service::where('invoice_id', $request->invoice_id);

        $invoices = DB::table('invoices')
        ->join('statuses', 'statuses.id', '=', 'invoices.status_id')
        ->join('customers', 'customers.id', '=', 'invoices.customer_id')
        ->where('invoices.id', '=', $request->invoice_id)
        ->get();
        
            return back(compact('invoices', 'services'));
    }

    /**
     * Return all the invoices
     */
    public function index()
	{

        $invoices = DB::table('customers')
        ->leftjoin('invoices', 'customers.id', '=', 'invoices.customer_id')
        ->leftjoin('statuses', 'statuses.id', '=', 'invoices.status_id')
        ->get();

		return view('invoices.index', compact('invoices'));
    }


    /**
     * Return invoice's details
     */
    public function show($id)
    {
        $invoices = DB::table('invoices')
        ->join('statuses', 'statuses.id', '=', 'invoices.status_id')
        ->join('customers', 'customers.id', '=', 'invoices.customer_id')
        ->where('invoices.id', '=', $id)
        ->get();
        
        $services = Service::where('invoice_id', $id);

        return view('invoices.show', compact('invoices', 'services', 'id'));
    }

    /**
     * Invoice's update with request's datas
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
     * Delete the invoice
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return back();

    }
}
