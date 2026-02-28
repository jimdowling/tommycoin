<?php

return [
    'stripe' => [
        'key'     => env('STRIPE_KEY'),
        'secret'  => env('STRIPE_SECRET'),
        'webhook' => env('STRIPE_WEBHOOK_SECRET'),
    ],
];
