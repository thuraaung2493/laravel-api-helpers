<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Responses\ApiErrorResponse;

use function Safe\json_decode;

it('can create a new Api Error Response', function (): void {
    expect(
        new ApiErrorResponse(
            title: 'Error',
            description: 'This is error!',
        ),
    )->toBeInstanceOf(ApiErrorResponse::class);
});

it('can create a Json Response', function (): void {
    $response = (new ApiErrorResponse(
        title: 'Error',
        description: 'This is error!',
    ))->toResponse(
        request: Request::create(
            uri: '/',
        )
    );
    expect(
        $response,
    )->toBeInstanceOf(JsonResponse::class)->and(
        $response->status(),
    )->toEqual(Status::INTERNAL_SERVER_ERROR->value)->and(
        $response->headers->all(),
    )->toBeArray()->and(
        json_decode($response->getContent())
    )->toMatchObject([
        'title' => 'Error',
        'description' => 'This is error!',
        'status' => Status::INTERNAL_SERVER_ERROR->value,
    ]);
});
