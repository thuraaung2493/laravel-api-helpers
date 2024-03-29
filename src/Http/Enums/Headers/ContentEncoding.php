<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Enums\Headers;

/**
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Encoding
 */
enum ContentEncoding: string
{
    case BR = 'br';
    case COMPRESS = 'compress';
    case DEFLATE = 'deflate';
    case GZIP = 'gzip';
}
