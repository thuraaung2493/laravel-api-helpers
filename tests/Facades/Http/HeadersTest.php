<?php

declare(strict_types=1);

use Thuraaung\ApiHelpers\Facades\Http\Headers;

it('returns the default headers', function (): void {
    expect(
        Headers::default()
    )->toBeArray()->toEqual(
        \config('api-helpers.headers.defaults')
    );
});
