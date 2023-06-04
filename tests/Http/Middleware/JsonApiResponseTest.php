<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\Response;
use Thuraaung\ApiHelpers\Http\Middleware\JsonApiResponse;

it('returns the default headers', function (): void {
    $headers = new HeaderBag(
        headers: [
            'Content-Type' => 'application/json',
        ],
    );

    $response = (new JsonApiResponse())->handle(
        request: createRequest('get', '/', $headers),
        next: fn () => new Response(),
    );

    foreach (\config('api-helpers.headers.defaults') as $key => $value) {
        expect($response->headers->contains(
            key: str($key)->lower()->toString(),
            value: $value
        ))->toBeTrue();
    }
});
