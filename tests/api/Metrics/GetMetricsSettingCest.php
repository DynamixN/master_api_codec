<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/19/18
 * Time: 2:13 PM
 */

class GetMetricsSettingCest
{
    public function tryToTest(ApiTester $I)
    {

        $I->amAuthorizedByUser();
        $I->haveHttpHeader("Accept", "application/json");
        $I->haveHttpHeader("X-Company-Id","1");
        $I->sendGET("metrics/278/settings/month", [
            'X-Company-Id' => '1',

        ]);
        $I->canSeeResponseCodeIs(200);
        $I->canSeeResponseIsJson();

    }
}