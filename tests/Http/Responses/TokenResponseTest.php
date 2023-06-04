<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\NewAccessToken;
use Laravel\Sanctum\PersonalAccessToken;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Responses\TokenResponse;

use function Safe\json_decode;

it('can create a new Message Response', function (): void {
    expect(
        new TokenResponse(
            token: new NewAccessToken(new PersonalAccessToken(), ''),
        )
    )->toBeInstanceOf(TokenResponse::class);
});

it('can create a Json Response', function (): void {
    $response = (new TokenResponse(
        token: new NewAccessToken(new PersonalAccessToken(), ''),
    ))->toResponse(
        request: Request::create(
            uri: '/',
        )
    );

    $token  = new stdClass();
    $token->token = '';

    expect(
        $response,
    )->toBeInstanceOf(JsonResponse::class)->and(
        $response->status(),
    )->toEqual(Status::OK->value)->and(
        $response->headers->all(),
    )->toBeArray()->and(
        json_decode($response->getContent())
    )->toMatchObject([
        'data' => $token,
        'message' => 'Success.',
        'status' => Status::OK->value,
    ]);
});
