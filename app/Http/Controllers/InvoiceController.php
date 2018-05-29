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
            'TVAAmount' => $tvaAmount,
            'invoice_id' => $request->invoice_id,
        ]);

        $services = Service::where('invoice_id', $request->invoice_id)
                            ->get();

        $invoice = Invoice::find($request->invoice_id);
        
        $htAmount = $invoice['HTAmount'] + $htAmount;
        $ttcAmount = $invoice['TTCAmount'] + $ttcAmount;
        $tvaAmount = $invoice['TVA'] + $tvaAmount;

        $newInvoice = Invoice::find($request->invoice_id);
        $newInvoice->HTAmount = $htAmount;
        $newInvoice->TTCAmount = $ttcAmount;
        $newInvoice->TVA = $tvaAmount; 
        
        $newInvoice->save();

        $id = $request->invoice_id;

        $invoices = DB::table('invoices')
        ->join('statuses', 'statuses.id', '=', 'invoices.status_id')
        ->join('customers', 'customers.id', '=', 'invoices.customer_id')
        ->where('invoices.id', '=', $request->invoice_id)
        ->get();
        
        

        return view('invoices.show', compact('invoices', 'services', 'id'));
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
        
        $services = Service::where('invoice_id', $id)
                            ->get();

        return view('invoices.show', compact('invoices', 'services', 'id'));
    }

    /**
     * Return customer's details
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);
        $statuses = Status::pluck('description', 'id');
        $customers = Customer::pluck('name', 'id');

        return view('invoices.edit', compact('invoice', 'statuses', 'customers'));
    }

    /**
     * Invoice's update with request's datas
     */
    public function update(InvoiceRequest $request)
    {
        /** Change the datas */
        $invoice = Invoice::find($request->id);
        $invoice->limitDate = $request->limitDate;
        $invoice->HTAmount = $request->HTAmount;
        $invoice->TTCAmount = $request->TTCAmount;
        $invoice->TVA = $request->TVA;
        $invoice->customer_id = $request->customer_id;
        $invoice->status_id = $request->status_id;
        $invoice->save();
        
        /**Get the infos to show invoice's details */
        $invoice = invoice::find($request->id);
        $statuses = Status::pluck('description', 'id');
        $customers = Customer::pluck('name', 'id');
        return view('invoices.edit', compact('invoice', 'statuses', 'customers'));
    }
    
    /**
     * Delete the invoice
     */
    public function destroy($id)
    {
        $customer = Invoice::find($id);
        $customer->delete();
        return back();

    }


    /**
     * Delete the service
     */
    public function destroyService($id)
    {
        $service = Service::find($id);

        $htAmount = $service['HTAmount'];
        $tvaAmount = $service['TVAAmount'];
        $ttcAmount = $service['TTCAmount'];
        $invoiceId = $service['invoice_id'];

        $service->delete();


        $services = Service::where('invoice_id', $invoiceId)
                            ->get();

        $invoice = Invoice::find($invoiceId);
        

        
        $htAmount = $invoice['HTAmount'] - $htAmount;
        $ttcAmount = $invoice['TTCAmount'] - $ttcAmount;
        $tvaAmount = $invoice['TVA'] - $tvaAmount;

        

        $newInvoice = Invoice::find($invoiceId);
        $newInvoice->HTAmount = $htAmount;
        $newInvoice->TTCAmount = $ttcAmount;
        $newInvoice->TVA = $tvaAmount; 
        
        $newInvoice->save();

        $invoices = DB::table('invoices')
        ->join('statuses', 'statuses.id', '=', 'invoices.status_id')
        ->join('customers', 'customers.id', '=', 'invoices.customer_id')
        ->where('invoices.id', '=', $invoiceId)
        ->get();
        
        $id = $invoiceId;

        return view('invoices.show', compact('invoices', 'services', 'id'));

    }
}
