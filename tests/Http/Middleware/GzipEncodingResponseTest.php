<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\Response;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\AcceptEncoding;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentEncoding;
use Thuraaung\ApiHelpers\Http\Middleware\GzipEncodingResponse;

use function Safe\gzdecode;

it('can handle the content encoding', function (): void {
    $headers = new HeaderBag(
        headers: AcceptEncoding::of(ContentEncoding::GZIP)->headers(),
    );

    $response = (new GzipEncodingResponse())->handle(
        request: createRequest('get', '/', $headers),
        next: fn () => (new Response())->setContent('Hello'),
    );

    expect($response->headers->get('Content-Encoding'))->toBe(ContentEncoding::GZIP->value);
    expect($response->headers->get('x-vapor-base64-encode'))->toBe('True');
    expect(gzdecode($response->getContent()))->toBe('Hello');
});
