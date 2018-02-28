<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/28/18
 * Time: 1:21 PM
 */

class PostFullMetricSettingValuesCest
{
    public function tryToTest(ApiTester $I)
    {
        $interval = 2592000;
        $name_m = "Statss18";

        $I->amAuthorizedByUser();
        $metricId = $I->amCreateMetric($name_m);
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id","1");
        $I->sendPOST("metrics/{$metricId}/settings/month", [
            'X-Company-Id' => '1',
            'start' => '1486112400',
            'end' => '1504947600',
            'focus_start' => '1486112400',
            'focus_end' => '1504947600',
            'interval' => $interval,
            'chart_type' => '1',
            // 'field0' => 'current',
            'field1' => 'min',
            'field2' => 'max',
            'field3' => 'count',
            'field4' => 'avg',
            'field5' => null

        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'interval' => $interval
        ]);
        $I->sendPOST("metrics/values", [
            'X-Company-Id' => '1',
            'metrics' => [
                [
                    'id' => $metricId,
                    'interval' => $interval,
                    'values' => [
                        ['x' => 1501545600, 'value' => 55, 'reportedViewed' => false],
                        ['x' => 1504224000, 'value' => 77, 'reportedViewed' => false],
                        ['x' => 1498867200, 'value' => 40, 'reportedViewed' => false],
                        ['x' => 1496275200, 'value' => 23, 'reportedViewed' => false],
                        ['x' => 1493596800, 'value' => 45, 'reportedViewed' => false],
                        ['x' => 1491004800, 'value' => 10, 'reportedViewed' => false],
                        ['x' => 1488326400, 'value' => 18, 'reportedViewed' => false]
                    ]
                ]
            ]
        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();

    }

}