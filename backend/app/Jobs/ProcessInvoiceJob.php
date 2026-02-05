<?php

namespace App\Jobs;

use App\Models\Invoice;
use App\Services\AIService;
use App\Services\OCRService;
use App\Services\ValidationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessInvoiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Invoice $invoice
    ) {}

    public function handle(
        OCRService $ocrService,
        AIService $aiService,
        ValidationService $validationService
    ): void {
        // TODO: 1. Run OCR, 2. Structure with AI, 3. Validate
    }
}
