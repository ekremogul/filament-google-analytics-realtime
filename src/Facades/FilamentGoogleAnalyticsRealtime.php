<?php

namespace Ekremogul\FilamentGoogleAnalyticsRealtime\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ekremogul\FilamentGoogleAnalyticsRealtime\FilamentGoogleAnalyticsRealtime
 */
class FilamentGoogleAnalyticsRealtime extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ekremogul\FilamentGoogleAnalyticsRealtime\FilamentGoogleAnalyticsRealtime::class;
    }
}
