<?php

declare(strict_types=1);

use Thuraaung\ApiHelpers\DataObjects\Header;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\Accept;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType;

it('can create a new accept header', function (): void {
    expect(
        new Accept(
            value: ContentType::JSON
        )
    )
        ->toBeInstanceOf(Accept::class);
});

it('can create a new accept header from factory method', function (): void {
    expect(
        Accept::of(
            type: ContentType::JSON
        )
    )->toBeInstanceOf(Accept::class);
});

it('can turn the accept header into a header', function (): void {
    expect(
        Accept::of(
            type: ContentType::JSON
        )->asHeader()
    )->toBeInstanceOf(Header::class);
});

it('can turn the accept header into a header array', function (): void {
    expect(
        Accept::of(
            type: ContentType::JSON
        )->headers()
    )->toBeArray()->toEqual([
        'Accept' => ContentType::JSON->value,
    ]);
});
