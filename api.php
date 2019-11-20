<?php

return [
    /*
     * api rate limit
     */
    'rate_limits' => [
        // times / mintus
        'access' => env('RATE_LIMITS', '60,1'),
        // login times/ mintes
        'sign' => env('SIGN_RATE_LIMITS', '10, 1'),
    ]
];
