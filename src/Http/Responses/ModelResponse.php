<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;
use Thuraaung\ApiHelpers\Http\Concerns\ReturnsJsonResponse;
use Thuraaung\ApiHelpers\Http\Enums\Status;

final readonly class ModelResponse implements Responsable
{
    use ReturnsJsonResponse;

    public function __construct(
        private JsonResource $data,
        private Status $status = Status::OK,
        private string $message = 'Success.',
    ) {
    }
}
