<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http;

use function config;

final class Headers
{
    public function default(): array
    {
        return (array) config('api-helpers.headers.defaults');
    }
}
