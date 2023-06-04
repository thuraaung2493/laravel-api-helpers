<?php

declare(strict_types=1);

use Thuraaung\ApiHelpers\DataObjects\Header;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentType;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType as EnumContentType;

it('can create a new content type header', function (): void {
    expect(
        new ContentType(
            value: EnumContentType::JSON,
        )
    )
        ->toBeInstanceOf(ContentType::class);
});

it('can create a new content type header from factory method', function (): void {
    expect(
        ContentType::of(
            type: EnumContentType::JSON
        )
    )->toBeInstanceOf(ContentType::class);
});

it('can turn the content type header into a header', function (): void {
    expect(
        ContentType::of(
            type: EnumContentType::JSON
        )->asHeader()
    )->toBeInstanceOf(Header::class);
});

it('can turn the content type header into a header array', function (): void {
    expect(
        ContentType::of(
            type: EnumContentType::JSON
        )->headers()
    )->toBeArray()->toEqual([
        'Content-Type' => EnumContentType::JSON->value,
    ]);
});
