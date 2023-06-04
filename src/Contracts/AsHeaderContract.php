<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Contracts;

use Thuraaung\ApiHelpers\DataObjects\Header;

interface AsHeaderContract
{
    public function asHeader(): Header;
}
