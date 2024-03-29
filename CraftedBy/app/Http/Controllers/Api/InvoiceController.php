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

    public function store(StoreInvoiceRequest $request):void
    {
        //
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
