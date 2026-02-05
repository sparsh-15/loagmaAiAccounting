<?php

namespace App\Services;

class ValidationService
{
    public function validateInvoice(array $data): array
    {
        // TODO: Business rules validation (totals, line items, vendor, etc.)
        return ['valid' => true, 'errors' => []];
    }

    public function validateLineItems(array $lineItems, float $expectedTotal): bool
    {
        // TODO: Verify line item sum matches total
        return true;
    }
}
