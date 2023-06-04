<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Responses\ApiErrorResponse;

final class FileTypeNotMatchException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): Response
    {
        if ($request->isJson()) {
            return (new ApiErrorResponse(
                title: 'The file type does not match!',
                description: $this->message,
                status: Status::from($this->code),
            ))->toResponse($request);
        }

        return new Response(
            content: $this->message,
            status: $this->code,
        );
    }
}
