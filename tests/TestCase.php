<?php

namespace Ekremogul\FilamentGoogleAnalyticsRealtime\Tests;

use Ekremogul\FilamentGoogleAnalyticsRealtime\FilamentGoogleAnalyticsRealtimeServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Ekremogul\\FilamentGoogleAnalyticsRealtime\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentGoogleAnalyticsRealtimeServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-google-analytics-realtime_table.php.stub';
        $migration->up();
        */
    }
}
