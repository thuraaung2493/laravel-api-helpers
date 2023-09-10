<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Thuraaung\ApiHelpers\Http\Concerns\ReturnsJsonResponse;
use Thuraaung\ApiHelpers\Http\Enums\Status;

final readonly class ApiErrorResponse implements Responsable
{
    use ReturnsJsonResponse;

    public function __construct(
        private readonly string $message,
        private readonly string $details,
        private readonly Status $status = Status::INTERNAL_SERVER_ERROR,
    ) {
    }

    /**
     * @return array{message:string,details:string,status:int}
     */
    public function getData(): array
    {
        return [
            'message' => $this->message,
            'details' => $this->details,
            'status' => $this->status->value,
        ];
    }
}
