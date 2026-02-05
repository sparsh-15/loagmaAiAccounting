<?php

return [
    'list' => [
        'retail' => 'Retail',
        'manufacturing' => 'Manufacturing',
        'healthcare' => 'Healthcare',
        'construction' => 'Construction',
        'services' => 'Professional Services',
        'other' => 'Other',
    ],
    'schemas' => [
        'retail' => ['vendor', 'invoice_number', 'date', 'line_items', 'total', 'tax'],
        'manufacturing' => ['vendor', 'po_number', 'invoice_number', 'date', 'line_items', 'total', 'tax'],
        'healthcare' => ['vendor', 'patient_id', 'invoice_number', 'date', 'line_items', 'total'],
        'construction' => ['vendor', 'project', 'invoice_number', 'date', 'line_items', 'total', 'tax'],
        'services' => ['vendor', 'invoice_number', 'date', 'line_items', 'total', 'tax'],
        'other' => ['vendor', 'invoice_number', 'date', 'line_items', 'total'],
    ],
];
