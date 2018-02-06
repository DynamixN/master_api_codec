<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/1/18
 * Time: 1:08 PM
 */

class PostUpdateMetricCest
{
    public function tryToTest(ApiTester $I)
    {
        $interval = 2592000;
        $type = "number";

        $I->amAuthorized();
        $metricId = $I->amCreateMetric();
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id","1");
        $I->sendPOST("metrics/{$metricId}", [
            'X-Company-Id' => '1',
            'type' => $type,
            'name' => 'net_223',
            'is_additive' => '0',
            'is_positive' => '0',
            'is_complex' => '0',
            'interval' => $interval

        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'interval' => $interval
        ]);
        $I->canSeeResponseMatchesJsonType([
           "type" => "string:=$type"
        ]);

    }
}