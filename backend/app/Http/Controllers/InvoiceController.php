<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        // TODO: List invoices with pagination/filters
        return response()->json(['data' => []]);
    }

    public function store(Request $request): JsonResponse
    {
        // TODO: Create invoice from upload
        return response()->json(['message' => 'Invoice created']);
    }

    public function show(Invoice $invoice): JsonResponse
    {
        return response()->json(['data' => $invoice]);
    }

    public function update(Request $request, Invoice $invoice): JsonResponse
    {
        // TODO: Update invoice data
        return response()->json(['data' => $invoice]);
    }

    public function destroy(Invoice $invoice): JsonResponse
    {
        // TODO: Soft delete or remove
        return response()->json(['message' => 'Invoice deleted']);
    }
}
