<?php

return [
    'services' => [
        'current' => env('CURRENT_GATEWAY', 'placetopay'),
        'placetopay' => [
            'class' => \App\RemittanceGateway\PlaceToPayGateway::class,
            'settings' => [
                'login' => env('PLACETOPAY_LOGIN'),
                'tranKey' => env('PLACETOPAY_TRANKEY'),
                'baseUrl' => env('PLACETOPAY_BASE_URL')
            ]
        ],

    ]
];
