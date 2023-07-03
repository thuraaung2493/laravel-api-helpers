<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType as EnumContentType;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentType;
use Thuraaung\ApiHelpers\Http\Enums\Status;

final readonly class PaginatedResponse implements Responsable
{
    public function __construct(
        private AnonymousResourceCollection|ResourceCollection $resource,
        private string $message = 'Success',
        private Status $status = Status::OK,
    ) {
    }

    public function toResponse($request)
    {
        return (new PaginatedResourceResponse(
            resource: $this->resource->additional([
                'message' => $this->message,
                'status' => $this->status->value,
            ]),
        ))->toResponse($request)->withHeaders(
            headers: ContentType::of(EnumContentType::JSON)->headers(),
        );
    }
}
