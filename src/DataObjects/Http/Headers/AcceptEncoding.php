<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\DataObjects\Http\Headers;

use Thuraaung\ApiHelpers\Contracts\AsHeaderContract;
use Thuraaung\ApiHelpers\Contracts\DataObjectContract;
use Thuraaung\ApiHelpers\DataObjects\Header;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentEncoding;

final readonly class AcceptEncoding implements DataObjectContract, AsHeaderContract
{
    public function __construct(
        public ContentEncoding $value,
    ) {
    }

    public static function of(ContentEncoding $value): AcceptEncoding
    {
        return new AcceptEncoding(
            value: $value
        );
    }

    public function asHeader(): Header
    {
        return new Header(
            key: 'Accept-Encoding',
            value: $this->value
        );
    }

    public function headers(): array
    {
        return [
            'Accept-Encoding' => $this->value->value,
        ];
    }
}
