<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\DataObjects\Http\Headers;

use Thuraaung\ApiHelpers\Contracts\AsHeaderContract;
use Thuraaung\ApiHelpers\Contracts\DataObjectContract;
use Thuraaung\ApiHelpers\DataObjects\Header;

final readonly class ContentLength implements DataObjectContract, AsHeaderContract
{
    public function __construct(
        public int $value,
    ) {
    }

    public static function of(int $value): ContentLength
    {
        return new ContentLength(
            value: $value
        );
    }

    public function asHeader(): Header
    {
        return new Header(
            key: 'Content-Length',
            value: $this->value
        );
    }

    public function headers(): array
    {
        return [
            'Content-Length' => $this->value,
        ];
    }
}
