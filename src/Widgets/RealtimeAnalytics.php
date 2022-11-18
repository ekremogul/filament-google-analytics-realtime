<?php

namespace Ekremogul\FilamentGoogleAnalyticsRealtime\Widgets;

use Ekremogul\FilamentGoogleAnalyticsRealtime\FilamentGoogleAnalyticsRealtime;
use Filament\Widgets\Widget;

class RealtimeAnalytics extends Widget
{
    protected static string $view = 'filament-google-analytics-realtime::widget';

    public $loaded = false;

    public $totalVisitor = 0;

    public $visitors = [];

    public $pages = [];

    public function init()
    {
        $this->loaded = true;
    }

    protected function getData(): array
    {
        $data = app(FilamentGoogleAnalyticsRealtime::class)->getRealtimeData();
        $this->totalVisitor = $data['activeVisitors'];
        $details = collect($data['Details']);
        $visitors = collect([
            ['Device' => 'Desktop', 'Total' => $details->sum('Desktop')],
            ['Device' => 'Mobile', 'Total' => $details->sum('Mobile')],
            ['Device' => 'Tablet', 'Total' => $details->sum('Tablet')],
        ]);
        $this->visitors = $visitors->sortByDesc('Total');
        $this->pages = $details->sortByDesc('Total')->take(10);

        return [];
    }

    protected function getViewData(): array
    {
        return [
            'data' => $this->loaded ? $this->getData() : [
                'activeVisitors' => 0,
                'Details' => [],
            ],
        ];
    }
}
