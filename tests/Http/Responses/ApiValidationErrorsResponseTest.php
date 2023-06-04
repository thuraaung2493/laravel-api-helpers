<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Responses\ApiValidationErrorsResponse;

use function Safe\json_decode;

it('can create a new Api Validation Errors Response', function (): void {
    expect(
        new ApiValidationErrorsResponse(
            title: 'Error',
            errors: new MessageBag(['This field is required!']),
        ),
    )->toBeInstanceOf(ApiValidationErrorsResponse::class);
});

it('can create a Json Response', function (): void {
    $response = (new ApiValidationErrorsResponse(
        title: 'Error',
        errors: new MessageBag(['This field is required!']),
    ))->toResponse(
        request: Request::create(
            uri: '/',
        )
    );
    expect(
        $response,
    )->toBeInstanceOf(JsonResponse::class)->and(
        $response->status(),
    )->toEqual(Status::UNPROCESSABLE_CONTENT->value)->and(
        $response->headers->all(),
    )->toBeArray()->and(
        json_decode($response->getContent())
    )->toMatchObject([
        'title' => 'Error',
        'errors' => [['This field is required!']],
        'status' => Status::UNPROCESSABLE_CONTENT->value,
    ]);
});
