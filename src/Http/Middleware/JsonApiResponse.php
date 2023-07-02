<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Thuraaung\ApiHelpers\Facades\Http\Headers;
use Illuminate\Support\Str;

use function explode;

final class JsonApiResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response */
        $response = $next($request);

        if ($request->isJson() && ! $this->isImageContentType($response)) {
            $response->headers->add(
                headers: Headers::default(),
            );
        }

        return $response;
    }

    private function isImageContentType(Response $response): bool
    {
        $contentType = $response->headers->get('Content-Type');

        if (null === $contentType) {
            return false;
        }

        return Str::contains(
            haystack: 'image',
            needles: explode(
                separator: '/',
                string: $contentType
            ),
        );
    }
}
