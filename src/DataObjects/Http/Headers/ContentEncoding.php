<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\DataObjects\Http\Headers;

use Thuraaung\ApiHelpers\Contracts\AsHeaderContract;
use Thuraaung\ApiHelpers\Contracts\DataObjectContract;
use Thuraaung\ApiHelpers\DataObjects\Header;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentEncoding as ContentEncodingEnum;

final readonly class ContentEncoding implements DataObjectContract, AsHeaderContract
{
    public function __construct(
        public ContentEncodingEnum $value,
    ) {
    }

    public static function of(ContentEncodingEnum $type): ContentEncoding
    {
        return new ContentEncoding(
            value: $type
        );
    }

    public function asHeader(): Header
    {
        return new Header(
            key: 'Content-Encoding',
            value: $this->value
        );
    }

    public function headers(): array
    {
        return [
            'Content-Encoding' => $this->value->value,
            'X-Vapor-Base64-Encode' => 'True',
        ];
    }
}
