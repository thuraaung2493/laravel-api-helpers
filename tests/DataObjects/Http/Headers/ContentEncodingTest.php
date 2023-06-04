<?php

declare(strict_types=1);

use Thuraaung\ApiHelpers\DataObjects\Header;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentEncoding;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentEncoding as EnumContentEncoding;

it('can create a new content encoding header', function (): void {
    expect(
        new ContentEncoding(
            value: EnumContentEncoding::GZIP,
        )
    )
        ->toBeInstanceOf(ContentEncoding::class);
});

it('can create a new content encoding header from factory method', function (): void {
    expect(
        ContentEncoding::of(
            type: EnumContentEncoding::GZIP
        )
    )->toBeInstanceOf(ContentEncoding::class);
});

it('can turn the content encoding header into a header', function (): void {
    expect(
        ContentEncoding::of(
            type: EnumContentEncoding::GZIP
        )->asHeader()
    )->toBeInstanceOf(Header::class);
});

it('can turn the content encoding header into a header array', function (): void {
    expect(
        ContentEncoding::of(
            type: EnumContentEncoding::GZIP
        )->headers()
    )->toBeArray()->toEqual([
        'Content-Encoding' => EnumContentEncoding::GZIP->value,
        'X-Vapor-Base64-Encode' => 'True',
    ]);
});
