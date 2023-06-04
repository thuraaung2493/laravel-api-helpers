<?php

declare(strict_types=1);

namespace Thuraaung\ApiHelpers\Providers;

use Illuminate\Support\ServiceProvider;

final class PackageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/api-helpers.php',
            'api-helpers'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/api-helpers.php' => config_path('api-helpers.php'),
        ]);
    }
}
