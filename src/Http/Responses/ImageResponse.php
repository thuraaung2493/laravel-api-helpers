<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentType;
use Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType as EnumContentType;
use Thuraaung\ApiHelpers\Http\Enums\Status;
use Thuraaung\ApiHelpers\Http\Exceptions\FileTypeNotMatchException;

final readonly class ImageResponse implements Responsable
{
    public function __construct(
        private string $path,
    ) {
    }

    public function toResponse($request): HttpFoundationResponse
    {
        $file = Storage::get($this->path);

        $this->checkType();

        return $this->makeResponse($file);
    }

    private function makeResponse(string|null $file): HttpFoundationResponse
    {
        return Response::make(
            content: $file,
            status: Status::OK->value,
            headers: ContentType::of(EnumContentType::IMAGE)->headers(),
        )
            ->setMaxAge(60 * 60 * 168)
            ->setPrivate();
    }

    /**
     * @throws FileTypeNotMatchException
     */
    private function checkType(): void
    {
        $type = Storage::mimeType($this->path);

        if (false === $type) {
            throw new FileTypeNotMatchException(
                message: 'File type does not support!',
                code: Status::NOT_ACCEPTABLE->value,
            );
        }
    }
}
