<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return InvoiceResource::collection(Invoice::all());
    }

    public function store(Request $request):void
    {
        Invoice::create($request->all());
    }

    public function show(Invoice $invoice)
    {
        return $invoice;
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
