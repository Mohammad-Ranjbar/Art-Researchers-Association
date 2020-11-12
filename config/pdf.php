<?php

return [
    'mode' => 'utf-8',
    'format' => 'A4',
    'author' => '',
    'subject' => '',
    'keywords' => '',
    'creator' => 'mohammad javad ranjbar',
    'display_mode' => 'fullpage',
    'tempDir' => base_path('../temp/'),
    'font_path' => public_path('fonts/vendor/vazir-dist/'),
    'font_data' => [
        'vazir' => [
            'R' => 'Vazir.ttf',    // regular font
            'B' => 'Vazir-Bold.ttf',       // optional: bold font
            //'I'  => '',     // optional: italic font
            //'BI' => '', // optional: bold-italic font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ]
    ]
];
