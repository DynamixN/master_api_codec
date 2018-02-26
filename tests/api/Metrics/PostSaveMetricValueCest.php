<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/26/18
 * Time: 4:01 PM
 */
use \Helper\Api as api;

class PostSaveMetricValueCest
{
    public function tryToTest(ApiTester $I)
    {
        $interval = 2592000;
        $name_m = "Statss6";

        $I->amAuthorizedByUser();
        $metricId = $I->amCreateMetric($name_m);
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id", "1");
        $I->sendPOST("metrics/{$metricId}/settings/month", [
            'X-Company-Id' => '1',
            'metrics' => [
                [
                    'id' => 123,
                    'interval' => $interval,
                    'values' => [
                        ['x' => api::getActualDate(api::ONE_MONTH*(-12)), 'value' => 55],
                        ['x' => api::getActualDate(api::ONE_MONTH*(-11)), 'value' => 77]
                    ]
                ]
            ]

        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'interval' => $interval
        ]);

    }
}