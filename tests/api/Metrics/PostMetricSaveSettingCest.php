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
        $name_m = "Statss5";

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
  //        'field0' => 'current',
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

    }
}