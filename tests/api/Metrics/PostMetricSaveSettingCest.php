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
        $interval = 604800;
        $name_m = "Stats";

        $I->amAuthorizedByUser();
        $metricId = $I->amCreateMetric($name_m);
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id","1");
        $I->sendPOST("metrics/{$metricId}/settings/month", [
            'X-Company-Id' => '1',
            'start' => '1493629200',
            'end' => '1506762000',
            'focus_start' => '1493629200',
            'focus_end' => '1506762000',
            'interval' => $interval,
            'chart_type' => '1',
            'field0' => 'Null',
            'field1' => 'Min',
            'field2' => 'Max',
            'field3' => 'Avg',
            'field4' => 'Null',
            'field5' => 'Null'

        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();
        $I->canSeeResponseContainsJson([
            'interval' => $interval
        ]);

    }
}