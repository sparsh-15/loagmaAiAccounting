<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function queue(Request $request): JsonResponse
    {
        // TODO: List invoices pending review
        return response()->json(['data' => []]);
    }

    public function show(Invoice $invoice): JsonResponse
    {
        return response()->json(['data' => $invoice->load(['vendor', 'lineItems'])]);
    }

    public function approve(Request $request, Invoice $invoice): JsonResponse
    {
        // TODO: Approve invoice and finalize
        return response()->json(['message' => 'Invoice approved']);
    }

    public function reject(Request $request, Invoice $invoice): JsonResponse
    {
        // TODO: Reject with reason
        return response()->json(['message' => 'Invoice rejected']);
    }

    public function saveEdits(Request $request, Invoice $invoice): JsonResponse
    {
        // TODO: Save manual edits from review screen
        return response()->json(['data' => $invoice]);
    }
}
