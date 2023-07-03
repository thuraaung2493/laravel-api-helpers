<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Responses\PaginatedResponse;

use function Safe\json_decode;

it('can create a new Paginated Response', function (): void {
    expect(
        new PaginatedResponse(
            resource: new ResourceCollection(new Collection()),
        )
    )->toBeInstanceOf(PaginatedResponse::class);
});

it('can create a Json Response', function (): void {
    $response = (new PaginatedResponse(
        resource: new ResourceCollection(new Collection()),
    ))->toResponse(
        request: Request::create(
            uri: '/',
        )
    );

    $links = new stdClass();
    $links->first = null;
    $links->last = null;
    $links->prev = null;
    $links->next = null;

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
        'meta' => [],
        'links' => $links,
        'message' => 'Success',
        'status' => Status::OK->value,
    ]);
});
