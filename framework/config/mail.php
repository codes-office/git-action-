<?php
/*
@copyright

Fleet Manager v6.1

Copyright (C) 2017-2022 Hyvikk Solutions <https://hyvikk.com/> All rights reserved.
Design and developed by Hyvikk Solutions <https://hyvikk.com/>

 */
// save your email config here:
return [
    'driver' => env('MAIL_MAILER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.hostinger.com'),
    'port' => env('MAIL_PORT', 465),
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'info@mltcorporate.com'),
        'name' => env('MAIL_FROM_NAME', 'ETS'),
    ],
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),
];

