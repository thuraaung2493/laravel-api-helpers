# Laravel API Helpers

**It supports Laravel 9+ and PHP 8.1+**

## Description

This package contains many utility classes that assist in API creation.

## Installation

### Laravel

Require this package with composer using the following command:

```bash
composer require thuraaung2493/laravel-api-helpers@dev
```

## Usage

### Helper Classes for Json API Responses

**All API Response classes implement the Responsable interface.**

| Class                                                                   | Description                                          |
| ----------------------------------------------------------------------- | ---------------------------------------------------- |
| Thuraaung\ApiHelpers\Http\Responses\ModelResponse::class                | It returns json response for **JsonResource**.       |
| Thuraaung\ApiHelpers\Http\Responses\CollectionResponse::class           | It returns json response for **CollectionResource**. |
| Thuraaung\ApiHelpers\Http\Responses\MessageResponse::class              | It returns json response for **Message**.            |
| Thuraaung\ApiHelpers\Http\Responses\TokenResponse::class                | It returns json response for **Token**.              |
| Thuraaung\ApiHelpers\Http\Responses\ApiErrorResponse::class             | It returns json response for **Errors**.             |
| Thuraaung\ApiHelpers\Http\Responses\ApiValidationErrorsResponses::class | It returns json response for **Validations**.        |

_Response Formats_ see in [responses.json](https://github.com/thuraaung2493/laravel-api-helpers/blob/main/responses.json)

```json
// Response Format for ModelResponse|CollectionResponse|MessageResponse|TokenResponse
{
    "data": "",
    "message": "Success.",
    "status": 200
}
// Response Format for ApiErrorResponse
{
    "title": "Error!",
    "description": "Error Description",
    "status": 500
}
// Response Format for ApiValidationErrorsResponse
{
    "title": "Error!",
    "errors": [],
    "status": 422
}
```

### Middleware Classes

| Class                                                            | Description                                           |
| ---------------------------------------------------------------- | ----------------------------------------------------- |
| Thuraaung\ApiHelpers\Http\Middleware\GzipEncodingResponse::class | It is used to apply Gzip encoding to API responses.   |
| Thuraaung\ApiHelpers\Http\Middleware\JsonApiResponse::class      | It is used to apply default headers to API responses. |

To change default headers in config

```bash
php artisan vendor:publish --tab=api-helpers
```

### DataObjects

| Class                                                                | Description                          |
| -------------------------------------------------------------------- | ------------------------------------ |
| Thuraaung\ApiHelpers\DataObjects\Header::class                       | Header Data Object.                  |
| Thuraaung\ApiHelpers\DataObjects\Http\Headers\Accept::class          | Accept Header Data Object.           |
| Thuraaung\ApiHelpers\DataObjects\Http\Headers\AcceptEncoding::class  | Accept Encoding Header Data Object.  |
| Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentEncoding::class | Content Encoding Header Data Object. |
| Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentLength::class   | Content Length Header Data Object.   |
| Thuraaung\ApiHelpers\DataObjects\Http\Headers\ContentType::class     | Content Type Header Data Object.     |

_Example_

```php
  $accept = Accept::of(
    type: ContentType::JSON
  );

  // Turn to Header
  $accept->asHeader();
  // new Header(
  //   key: 'Accept',
  //   value: 'application/json',
  // );

  // Turn to headers array
  $accept->headers();
  // [
  //   'Accept' => 'application/json',
  // ]
```

### Enums

| Class                                                          | Description               |
| -------------------------------------------------------------- | ------------------------- |
| Thuraaung\ApiHelpers\Http\Enums\Status::class                  | HTTP Status.              |
| Thuraaung\ApiHelpers\Http\Enums\Scheme::class                  | Scheme.                   |
| Thuraaung\ApiHelpers\Http\Enums\Methods::class                 | Request Methods.          |
| Thuraaung\ApiHelpers\Http\Enums\Headers\Connection::class      | Connection Headers.       |
| Thuraaung\ApiHelpers\Http\Enums\Headers\ContentEncoding::class | Content Encoding Headers. |
| Thuraaung\ApiHelpers\Http\Enums\Headers\ContentType::class     | Content Type Headers.     |
