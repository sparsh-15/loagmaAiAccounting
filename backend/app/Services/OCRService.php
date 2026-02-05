<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class OCRService
{
    public function process(UploadedFile $file): array
    {
        // TODO: Call OCR engine (Tesseract, cloud API, etc.)
        return [];
    }

    public function getRawOutput(string $invoiceId): ?string
    {
        // TODO: Retrieve stored raw OCR output
        return null;
    }

    public function storeRaw(string $invoiceId, string $rawOutput): void
    {
        // TODO: Persist raw OCR result to storage/ocr_raw
    }
}
