<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Responses\MessageResponse;

use function Safe\json_decode;

it('can create a new Message Response', function (): void {
    expect(
        new MessageResponse()
    )->toBeInstanceOf(MessageResponse::class);
});

it('can create a Json Response', function (): void {
    $response = (new MessageResponse())->toResponse(
        request: Request::create(
            uri: '/',
        )
    );

    expect(
        $response,
    )->toBeInstanceOf(JsonResponse::class)->and(
        $response->status(),
    )->toEqual(Status::OK->value)->and(
        $response->headers->all(),
    )->toBeArray()->and(
        json_decode($response->getContent())
    )->toMatchObject([
        'data' => null,
        'message' => 'Success.',
        'status' => Status::OK->value,
    ]);
});
