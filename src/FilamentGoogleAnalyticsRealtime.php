<?php

namespace Ekremogul\FilamentGoogleAnalyticsRealtime;

use Google\Exception;

class FilamentGoogleAnalyticsRealtime
{
    public function getRealtimeData()
    {
        $analytics = $this->initializeAnalytics();

        $optParams = ['dimensions' => 'rt:pagePath, rt:deviceCategory'];
        try {
            $result = $analytics->data_realtime->get(
                'ga:'.config('filament-google-analytics-realtime.view_id'),
                'rt:activeUsers',
                $optParams
            );
            $activeVisitors = $result->totalsForAllResults['rt:activeUsers'];
            $Rows = collect($result->rows)->map(function ($row) {
                return [
                    'Path' => $row[0],
                    'Device' => $row[1],
                    'Visitor' => $row[2],
                ];
            });
            $totalVisitor = $Rows->groupBy('Path')->map(function ($rows) {
                $tmp = [
                    'Path' => null,
                    'Mobile' => 0,
                    'Desktop' => 0,
                    'Tablet' => 0,
                    'Total' => 0,
                ];
                foreach ($rows as $row) {
                    $tmp['Path'] = $row['Path'];
                    $tmp['Total'] += $row['Visitor'];

                    if ($row['Device'] == 'MOBILE') {
                        $tmp['Mobile'] += $row['Visitor'];
                    }
                    if ($row['Device'] == 'DESKTOP') {
                        $tmp['Desktop'] += $row['Visitor'];
                    }
                }

                return $tmp;
            })->sortByDesc('Total');

            return [
                'activeVisitors' => $activeVisitors,
                'Details' => $totalVisitor,
            ];
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    private function initializeAnalytics()
    {
        $client = new \Google_Client();
        $client->setAuthConfig(config('filament-google-analytics-realtime.key_file'));
        $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
        $analytics = new \Google_Service_Analytics($client);

        return $analytics;
    }
}
