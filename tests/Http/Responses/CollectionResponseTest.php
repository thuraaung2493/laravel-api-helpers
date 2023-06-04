<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Responses\CollectionResponse;

use function Safe\json_decode;

it('can create a new Collection Response', function (): void {
    expect(
        new CollectionResponse(
            data: new ResourceCollection(new Collection()),
        )
    )->toBeInstanceOf(CollectionResponse::class);
});

it('can create a Json Response', function (): void {
    $response = (new CollectionResponse(
        data: new ResourceCollection(new Collection()),
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
