<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Thuraaung\ApiHelpers\Http\Concerns\ReturnsJsonResponse;
use Thuraaung\ApiHelpers\Http\Enums\Status;

final readonly class MessageResponse implements Responsable
{
    use ReturnsJsonResponse;

    public function __construct(
        private string $message = 'Success.',
        private Status $status = Status::OK,
    ) {
    }

    /**
     * @return array{data:null,status:int,message:string}
     */
    public function getData(): array
    {
        return [
            'status' => $this->status->value,
            'message' => $this->message,
        ];
    }
}
