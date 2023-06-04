<?php

declare(strict_types=1);

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Responses\ModelResponse;

use function Safe\json_decode;

it('can create a new Model Response', function (): void {
    expect(
        new ModelResponse(
            data: new JsonResource(new User()),
        )
    )->toBeInstanceOf(ModelResponse::class);
});

it('can create a Json Response', function (): void {
    $response = (new ModelResponse(
        data: new JsonResource(new User()),
    ))->toResponse(
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
        'data' => [],
        'message' => 'Success.',
        'status' => Status::OK->value,
    ]);
});
