<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Concerns;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentType;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType as EnumContentType;
use Thuraaung\ApiHelpers\Http\Enums\Status;

/**
 * @property-read JsonResource|ResourceCollection|AnonymousResourceCollection $resource
 * @property-read string $message
 * @property-read Status $status
 */
trait ReturnsResourceResponse
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        $this->setWrap();

        return (new ResourceResponse(
            resource: $this->resource->additional([
                'message' => $this->message,
                'status' => $this->status->value,
            ]),
        ))->toResponse($request)->withHeaders(
            headers: ContentType::of(EnumContentType::JSON)->headers()
        );
    }

    private function setWrap(): void
    {
        if ($this->resource instanceof AnonymousResourceCollection) {
            AnonymousResourceCollection::wrap($this->resource->collects::$wrap);
        }
    }
}
