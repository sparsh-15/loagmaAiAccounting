<?php

namespace App\Services;

class ConfidenceService
{
    public function calculateFieldConfidence(array $extractions): array
    {
        // TODO: Compute confidence scores per field
        return [];
    }

    public function overallConfidence(array $fieldScores): float
    {
        // TODO: Aggregate confidence score
        return 0.0;
    }

    public function flagLowConfidence(array $extractions, float $threshold = 0.8): array
    {
        // TODO: Return fields below threshold for review
        return [];
    }
}
