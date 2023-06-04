<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Facades\Http;

use Illuminate\Support\Facades\Facade;
use Thuraaung\ApiHelpers\Http\Headers as HttpHeaders;

/**
 * @method static array default()
 *
 * @see HttpHeaders
 */
final class Headers extends Facade
{
    /**
     * @return class-string
     */
    protected static function getFacadeAccessor(): string
    {
        return HttpHeaders::class;
    }
}
