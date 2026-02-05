<?php

namespace App\Services;

use App\Models\Industry;

class IndustryMapper
{
    public function detectFromContent(string $rawContent): ?Industry
    {
        // TODO: Infer industry from invoice content/keywords
        return null;
    }

    public function mapToSchema(string $industryCode): array
    {
        // TODO: Return field schema for given industry
        return config('industries.schemas.' . $industryCode, []);
    }

    public function supportedIndustries(): array
    {
        return config('industries.list', []);
    }
}
