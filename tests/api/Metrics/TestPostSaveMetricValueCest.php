<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/26/18
 * Time: 5:45 PM
 */

class TestPostSaveMetricValueCest
{
    public function tryToTest(ApiTester $I)
    {
        $interval = 2592000;
        $name_m = "Session";

        $I->amAuthorizedByUser();
        $metricId = $I->amCreateMetric($name_m);
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id", "1");
        $I->sendPOST("metrics/values", [
            'X-Company-Id' => '1',
            'metrics' => [
                [
                    'id' => $metricId,
                    'interval' => $interval,
                    'values' => [
                        ['x' => 1501545600, 'value' => 55, 'reportedViewed' => false],
                        ['x' => 1504224000, 'value' => 77, 'reportedViewed' => false]
                    ]
                ]
            ]

        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
//        $I->canSeeResponseContainsJson([
//            'interval' => $interval
//        ]);

    }
}