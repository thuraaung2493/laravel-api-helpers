<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\MessageBag;
use Thuraaung\ApiHelpers\Http\Concerns\ReturnsJsonResponse;
use Thuraaung\ApiHelpers\Http\Enums\Status;

final readonly class ApiValidationErrorsResponse implements Responsable
{
    use ReturnsJsonResponse;

    public function __construct(
        private readonly string $message,
        private readonly MessageBag $errors,
        private readonly Status $status = Status::UNPROCESSABLE_CONTENT,
    ) {
    }

    /**
     * @return array{message:string,errors:MessageBag,status:int}
     */
    public function getData(): array
    {
        return [
            'message' => $this->message,
            'status' => $this->status->value,
            'errors' => $this->errors,
        ];
    }
}
