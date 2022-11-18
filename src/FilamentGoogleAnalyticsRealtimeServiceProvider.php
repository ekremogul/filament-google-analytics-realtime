<?php

namespace Ekremogul\FilamentGoogleAnalyticsRealtime;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentGoogleAnalyticsRealtimeServiceProvider extends PluginServiceProvider
{
    protected array $widgets = [
        Widgets\RealtimeAnalytics::class,
    ];

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-google-analytics-realtime')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations();
    }
}
