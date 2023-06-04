<?php

declare(strict_types=1);

use Thuraaung\ApiHelpers\DataObjects\Header;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\AcceptEncoding;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentEncoding;

it('can create a new accept encoding header', function (): void {
    expect(
        new AcceptEncoding(
            value: ContentEncoding::GZIP
        )
    )
        ->toBeInstanceOf(AcceptEncoding::class);
});

it('can create a new accept encoding header from factory method', function (): void {
    expect(
        AcceptEncoding::of(
            value: ContentEncoding::GZIP
        )
    )->toBeInstanceOf(AcceptEncoding::class);
});

it('can turn the accept encoding header into a header', function (): void {
    expect(
        AcceptEncoding::of(
            value: ContentEncoding::GZIP
        )->asHeader()
    )->toBeInstanceOf(Header::class);
});

it('can turn the accept encoding header into a header array', function (): void {
    expect(
        AcceptEncoding::of(
            value: ContentEncoding::GZIP
        )->headers()
    )->toBeArray()->toEqual([
        'Accept-Encoding' => ContentEncoding::GZIP->value,
    ]);
});
