<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Enums;

enum Scheme: string
{
    case HTTP = 'HTTP';
    case HTTPS = 'HTTPS';
}
