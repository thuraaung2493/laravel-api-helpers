<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;
use Thuraaung\ApiHelpers\Http\Concerns\ReturnsResourceResponse;
use Thuraaung\ApiHelpers\Http\Enums\Status;

final readonly class ModelResponse implements Responsable
{
    use ReturnsResourceResponse;

    public function __construct(
        private JsonResource $resource,
        private string $message = 'Success.',
        private Status $status = Status::OK,
    ) {
    }
}
