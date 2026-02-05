<?php

namespace App\Services;

class AIService
{
    public function structureFromOcr(string $rawOcr, string $industry): array
    {
        // TODO: Call AI/LLM to extract structured data from raw OCR
        return [];
    }

    public function validateExtraction(array $structured): array
    {
        // TODO: AI-assisted validation of extracted fields
        return [];
    }
}
