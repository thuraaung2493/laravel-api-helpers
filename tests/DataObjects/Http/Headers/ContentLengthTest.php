<?php

declare(strict_types=1);

use Thuraaung\ApiHelpers\DataObjects\Header;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentLength;

it('can create a new content length header', function (): void {
    expect(
        new ContentLength(
            value: 1222,
        )
    )
        ->toBeInstanceOf(ContentLength::class);
});

it('can create a new content length header from factory method', function (): void {
    expect(
        ContentLength::of(
            value: 1222,
        )
    )->toBeInstanceOf(ContentLength::class);
});

it('can turn the content length header into a header', function (): void {
    expect(
        ContentLength::of(
            value: 1222
        )->asHeader()
    )->toBeInstanceOf(Header::class);
});

it('can turn the content length header into a header array', function (): void {
    expect(
        ContentLength::of(
            value: 1222
        )->headers()
    )->toBeArray()->toEqual([
        'Content-Length' => 1222,
    ]);
});
