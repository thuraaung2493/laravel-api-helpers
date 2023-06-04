<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Thuraaung\ApiHelpers\Http\Concerns\ReturnsJsonResponse;
use Thuraaung\ApiHelpers\Http\Enums\Status;

final readonly class CollectionResponse implements Responsable
{
    use ReturnsJsonResponse;

    public function __construct(
        private ResourceCollection|AnonymousResourceCollection $data,
        private Status $status = Status::OK,
        private string $message = 'Success.',
    ) {
    }
}
