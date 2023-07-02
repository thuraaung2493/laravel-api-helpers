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
        private readonly string $title,
        private readonly MessageBag $errors,
        private readonly Status $status = Status::UNPROCESSABLE_CONTENT,
    ) {
    }

    /**
     * @return array{title:string,errors:MessageBag,status:int}
     */
    public function getData(): array
    {
        return [
            'title' => $this->title,
            'errors' => $this->errors,
            'status' => $this->status->value,
        ];
    }
}
