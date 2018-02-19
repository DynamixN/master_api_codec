<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/1/18
 * Time: 1:17 PM
 */

class PostMetricSaveSettingCest
{
    public function tryToTest(ApiTester $I)
    {
        $interval = 2592000;
        $type = "number";

        $I->amAuthorizedByUser();
        $metricId = $I->amCreateMetric();
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id","1");
        $I->sendPOST("metrics/{$metricId}/settings/month", [
            'X-Company-Id' => '1',
            'start' => '1493629200',
            'end' => '1506762000',
            'focus_start' => '1493629200',
            'focus_end' => '1506762000',
            'interval' => $interval,
            'chart_type' => '',

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