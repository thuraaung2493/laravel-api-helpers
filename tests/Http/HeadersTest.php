<?php

declare(strict_types=1);

use Thuraaung\ApiHelpers\Http\Headers;

it('returns the default headers', function (): void {
    $headers = new Headers();

    expect(
        $headers->default()
    )->toBeArray()->toEqual(
        \config('api-helpers.headers.defaults')
    );
});
