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
        private readonly string $title,
        private readonly string $description,
        private readonly Status $status = Status::INTERNAL_SERVER_ERROR,
    ) {
    }

    /**
     * @return array{title:string,description:string,status:int}
     */
    public function getData(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status->value,
        ];
    }
}
