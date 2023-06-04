<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Responses\ImageResponse;

it('can create a new Image Response', function (): void {
    Storage::fake();

    $path = Storage::putFileAs('test', UploadedFile::fake()->image('test.png'), 'test.png');

    expect(
        new ImageResponse($path),
    )->toBeInstanceOf(ImageResponse::class);
});

it('can create a Json Response', function (): void {
    Storage::fake();

    $path = Storage::putFileAs('test', UploadedFile::fake()->image('test.png'), 'test.png');

    $response = (new ImageResponse($path))->toResponse(
        request: Request::create(
            uri: '/',
        )
    );
    expect(
        $response,
    )->toBeInstanceOf(Response::class)->and(
        $response->status(),
    )->toEqual(Status::OK->value)->and(
        $response->headers->all(),
    )->toBeArray()->and(
        $response->headers->get('Content-Type')
    )->toBe('image/*');
});
