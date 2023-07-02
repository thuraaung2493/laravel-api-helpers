<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Laravel\Sanctum\NewAccessToken;
use Thuraaung\ApiHelpers\Http\Concerns\ReturnsJsonResponse;
use Thuraaung\ApiHelpers\Http\Enums\Status;

final readonly class TokenResponse implements Responsable
{
    use ReturnsJsonResponse;

    public function __construct(
        private NewAccessToken $token,
        private Status $status = Status::OK,
        private string $message = 'Success.',
    ) {
    }

    /**
     * @return array{token:string,status:int,message:string}
     */
    public function getData(): array
    {
        return [
            'token' => $this->token->plainTextToken,
            'status' => $this->status->value,
            'message' => $this->message,
        ];
    }
}
