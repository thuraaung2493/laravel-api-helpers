<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentEncoding;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentEncoding as ContentEncodingEnum;

use function Safe\gzencode;

final class GzipEncodingResponse
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

        if (in_array('gzip', $request->getEncodings()) && function_exists('gzencode')) {
            $response->setContent(
                content: gzencode(
                    data: strval($response->getContent()),
                    level: 9,
                ),
            );

            $response->headers->add(
                headers: ContentEncoding::of(
                    type: ContentEncodingEnum::GZIP
                )->headers(),
            );
        }

        return $response;
    }
}
