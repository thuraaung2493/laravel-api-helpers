<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Http\Concerns;

trait GetData
{
    /**
     * @return array{data:JsonResource|ResourceCollection|AnonymousResourceCollection|array,status:int,message:string}
     */
    private function getData(): array
    {
        return [
            'data' => $this->data,
            'status' => $this->status->value,
            'message' => $this->message,
        ];
    }
}
