<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\DataObjects;

use Thuraaung\ApiHelpers\Contracts\DataObjectContract;

final readonly class Header implements DataObjectContract
{
    public function __construct(
        public string $key,
        public mixed $value,
    ) {
    }

    public static function of(string $key, mixed $value): Header
    {
        return new Header(
            key: $key,
            value: $value,
        );
    }

    public function headers(): array
    {
        return [
            $this->key => $this->value,
        ];
    }
}
