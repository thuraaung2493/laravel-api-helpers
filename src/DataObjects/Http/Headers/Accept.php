<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\DataObjects\Http\Headers;

use Thuraaung\ApiHelpers\Contracts\AsHeaderContract;
use Thuraaung\ApiHelpers\Contracts\DataObjectContract;
use Thuraaung\ApiHelpers\DataObjects\Header;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType;

final readonly class Accept implements DataObjectContract, AsHeaderContract
{
    public function __construct(
        public ContentType $value,
    ) {
    }

    public static function of(ContentType $type): Accept
    {
        return new Accept(
            value: $type
        );
    }

    public function asHeader(): Header
    {
        return new Header(
            key: 'Accept',
            value: $this->value
        );
    }

    public function headers(): array
    {
        return [
            'Accept' => $this->value->value,
        ];
    }
}
