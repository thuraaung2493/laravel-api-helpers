<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\DataObjects\Http\Headers;

use Thuraaung\ApiHelpers\Contracts\AsHeaderContract;
use Thuraaung\ApiHelpers\Contracts\DataObjectContract;
use Thuraaung\ApiHelpers\DataObjects\Header;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType as ContentTypeEnum;

final readonly class ContentType implements DataObjectContract, AsHeaderContract
{
    public function __construct(
        public ContentTypeEnum $value,
    ) {
    }

    public static function of(ContentTypeEnum $type): ContentType
    {
        return new ContentType(
            value: $type
        );
    }

    public function asHeader(): Header
    {
        return new Header(
            key: 'Content-Type',
            value: $this->value
        );
    }

    public function headers(): array
    {
        return [
            'Content-Type' => $this->value->value,
        ];
    }
}
