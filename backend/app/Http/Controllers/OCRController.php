<?php

namespace App\Http\Controllers;

use App\Services\OCRService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OCRController extends Controller
{
    public function __construct(
        protected OCRService $ocrService
    ) {}

    public function process(Request $request): JsonResponse
    {
        // TODO: Trigger OCR processing on uploaded image
        return response()->json(['message' => 'OCR processing initiated']);
    }

    public function status(string $jobId): JsonResponse
    {
        // TODO: Return OCR job status
        return response()->json(['status' => 'pending']);
    }

    public function raw(string $invoiceId): JsonResponse
    {
        // TODO: Return raw OCR output
        return response()->json(['data' => []]);
    }
}
