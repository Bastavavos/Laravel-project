<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = InvoiceResource::collection(Invoice::all());
        return response()->json([
            'invoices' => $invoices,
            'status' => true
        ]);
    }

    public function store(StoreInvoiceRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'customer_id' => 'required|uuid|exists:users,id',
            'product_id' => 'required|uuid|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create a new invoice
        $invoice = Invoice::create(['customer_id' => $validatedData['customer_id']]);

        // Associate product
        $invoice->product()->attach($validatedData['product_id'], ['product_quantity' => $validatedData['quantity']]);

        // Return a response or redirect
        return response()->json($invoice, 201);
    }


    public function show($id)
    {
        $invoice = InvoiceResource::make(Invoice::find($id));
        return response()->json([
            'invoice' => $invoice,
        ]);
    }

    public function update(Request $request, Invoice $invoice):bool
    {
        return $invoice->update($request->all());
    }

    public function destroy(Invoice $invoice): void
    {
        $invoice->delete();
    }
}
