<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Facade;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Thuraaung\ApiHelpers\Facades\Http\Headers;
use Thuraaung\ApiHelpers\Providers\PackageServiceProvider;

final class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            PackageServiceProvider::class,
        ];
    }

    /**
     * @param Application $app
     * @return array<string,class-string<Facade>>
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Headers' => Headers::class,
        ];
    }
}
