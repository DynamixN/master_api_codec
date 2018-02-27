<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/27/18
 * Time: 1:55 PM
 */

class DeleteMetricIdCest
{
    const API_URL = 'metrics';

    public function tryToTest(ApiTester $I)
    {
        $interval = 2592000;
        $name_m = "Statss14";

        $I->amAuthorizedByUser();
        $metricId = $I->amCreateMetric($name_m);
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id", "1");
        $I->sendDELETE("metrics/{$metricId}", [
            'Id' => $metricId
            ]
        );
        $I->sendGET(self::API_URL );
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->dontSeeResponseContainsJson([
            'name' => $name_m
        ]);
    }
}