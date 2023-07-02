<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Concerns;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentType;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType as EnumContentType;
use Thuraaung\ApiHelpers\Http\Enums\Status;

/**
 * @property-read array $data
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
}
