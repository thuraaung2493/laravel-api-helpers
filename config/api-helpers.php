<?php

declare(strict_types=1);

use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentEncoding;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType;

return [
    'headers' => [

        'defaults' => [
            'Connection' => 'keep-alive',

            'Content-Encoding' => ContentEncoding::GZIP->value,

            'Content-Type' => ContentType::JSON->value,

            'Keep-Alive' => 'timeout=5, max=100',

            'X-Vapor-Base64-Encode' => 'True',
        ],

    ],
];
