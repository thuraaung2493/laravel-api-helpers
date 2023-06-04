<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Concerns;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentType;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType as EnumContentType;
use Thuraaung\ApiHelpers\Http\Enums\Status;

/**
 * @property-read JsonResource|ResourceCollection|AnonymousResourceCollection|array $data
 * @property-read Status $status
 */
trait ReturnsJsonResponse
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->getData(),
            status: $this->status->value,
            headers: ContentType::of(EnumContentType::JSON)->headers(),
        );
    }

    /**
     * @return array{data:JsonResource|ResourceCollection|AnonymousResourceCollection|array,status:int,message:string}
     */
    private function getData(): array
    {
        return [
            'data' => $this->data,
            'status' => $this->status->value,
            'message' => $this->message,
        ];
    }
}
