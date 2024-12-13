<?php
/*
@copyright

Fleet Manager v6.1

Copyright (C) 2017-2022 Hyvikk Solutions <https://hyvikk.com/> All rights reserved.
Design and developed by Hyvikk Solutions <https://hyvikk.com/>

 */
// save your email config here:
return [
    'driver' => env('MAIL_MAILER'),
    'host' => env('MAIL_HOST'),
    'port' => env('MAIL_PORT'),
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS'),
        'name' => env('MAIL_FROM_NAME'),
    ],
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'encryption' => env('MAIL_ENCRYPTION'),
];

