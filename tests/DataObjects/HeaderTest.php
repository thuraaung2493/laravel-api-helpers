<?php

declare(strict_types=1);

use Thuraaung\ApiHelpers\DataObjects\Header;

it('can create a new Header', function (string $string): void {
    expect(
        (new Header(
            key: $string,
            value: $string,
        ))->headers()
    )->toBeArray()->toEqual([
        $string => $string
    ]);
})->with('strings');

it('can create a new Header from factory method', function (string $string): void {
    expect(
        Header::of(
            key: $string,
            value: $string
        )->headers()
    )->toBeArray()->toEqual([
        $string => $string
    ]);
})->with('strings');
